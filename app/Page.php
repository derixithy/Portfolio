<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'title', 'content', 'status'];

    public static function published()
    {
    	return self::whereStatus('PUBLISHED');
    }

    public static function trash()
    {
    	return self::whereStatus('DELETED');
    }

    public static function draft()
    {
    	return self::whereStatus('DRAFT');
    }

    public static function list()
    {
        return self::where('status', '!=', 'DELETED');
    }
}


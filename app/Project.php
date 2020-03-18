<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'parent', 'title', 'content', 'status'];

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
    	return self::whereStatus('draft');
    }
}

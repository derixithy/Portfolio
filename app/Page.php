<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'title', 'content', 'status'];


    public static function queryPublished( $query )
    {
    	return $query->whereStatus('PUBLISHED');
    }

    public static function queryTrash( $query )
    {
    	return $query->whereStatus('DELETED');
    }

    public static function queryDraft( $query )
    {
    	return $query->whereStatus('DRAFT');
    }

    public static function queryList( $query )
    {
        return $query->where('status', '!=', 'DELETED');
    }
}


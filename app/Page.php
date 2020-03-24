<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'title', 'content', 'status'];


    public static function scopePublished( $query )
    {
    	return $query->whereStatus('PUBLISHED');
    }

    public static function scopeTrash( $query )
    {
    	return $query->whereStatus('DELETED');
    }

    public static function scopeDraft( $query )
    {
    	return $query->whereStatus('DRAFT');
    }

    public static function scopeList( $query )
    {
        return $query->where('status', '!=', 'DELETED');
    }
}


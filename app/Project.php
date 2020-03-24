<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'parent', 'title', 'content', 'status'];

    public static function scopePublished( $query ) // ACTIVE, INACTIVE, DONE
    {
        return $query->whereStatus('ACTIVE')
            ->orWhere('status', '=', 'INACTIVE')
            ->orWhere('status', '=', 'DONE');
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

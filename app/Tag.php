<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public static function scopeList( $query )
    {
        return $query;
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function pages()
    {
        return $this->morphedByMany('App\Page', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function projects()
    {
        return $this->morphedByMany('App\Project', 'taggable');
    }
}
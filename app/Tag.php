<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
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
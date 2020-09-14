<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagController extends Controller
{
    //

    // Show a page by slug
    public function show($slug = 'over', \App\Tag $tag = null)
    {
        $tag = $tag ?: \App\Tag::whereName($slug)->first();

        if ( $tag )
        	return \View::make('tag.show')
        		->with('page', $tag)
                ->with('projects', $tag->projects)
                ->with('pages', $tag->pages)
        		->with('slug', $slug);

        throw new NotFoundHttpException;
    }
}

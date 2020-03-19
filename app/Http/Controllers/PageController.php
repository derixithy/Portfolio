<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    //

    // Show a page by slug
    public function show($slug = 'over')
    {
        $page = \App\Page::whereName($slug)->first();
        $projects = \App\Project::whereParent($slug)->get();

        if ( $page )
        	return \View::make('page.show')
        		->with('page', $page)
        		->with('projects', $projects)
        		->with('slug', $slug);

        throw new NotFoundHttpException;
    }
}

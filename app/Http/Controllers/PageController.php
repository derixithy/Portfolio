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
        $page = \App\Page::where('name', '=', $slug)->first();

        if ( $page )
        	return \View::make('page')->with('page', $page)->with('slug', $slug);

        throw new NotFoundHttpException;
    }
}

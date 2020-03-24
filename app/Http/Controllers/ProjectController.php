<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller
{
    //

    // Show a page by name
    public function show($name, \App\Project $page = null)
    {
        $page = $page ?: \App\Project::published()->whereName($name)->first();

        if ( $page )
        	return \View::make('project.show')
        		->with('page', $page);

        throw new NotFoundHttpException;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller
{
    //

    // Show a page by name
    public function show($name, $page = null)
    {
        $page = \App\Project::published()->whereName($page)->first() ?: \App\Project::list()->whereName($name)->first();

        if ( $page )
        	return \View::make('project.show')
        		->with('page', $page);
                echo ">>$name";
        //throw new NotFoundHttpException;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlbumController extends Controller
{
    //

    // Show a page by name
    public function show(string $name, \App\Project $page = null)
    {
        $page = $page ?: \App\Project::published()->whereName($name)->first();

        if ( $page )
            return \View::make('project.show')
                ->with('page', $page);
                echo ">>$name";

        throw new NotFoundHttpException;
    }
}

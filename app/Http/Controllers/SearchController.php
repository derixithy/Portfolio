<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class SearchController extends Controller
{
	public function show(Request $request){

		$search = $request->input('find');

		//now get all user and services in one go without looping using eager loading
		//In your foreach() loop, if you have 1000 users you will make 1000 queries
		//
		if ( $search )
			$projects =  Project::where('content', 'like', '%'.$search.'%')
			->orWhere('title', 'like', '%'.$search.'%')->get();

		else
			$projects = null;

		return \View::make('page.search')
			->with('projects', $projects)
			->with('slug', 'search')
			->with('search', $search);
	}
}

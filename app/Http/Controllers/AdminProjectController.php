<?php

namespace App\Http\Controllers;

use App\Project;
//use Illuminate\Http\Request;
use App\Http\Requests\ValidateProject;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Projecten',
            'pages' => Project::list()->get(),
        ];



        return view('project.index')->with($data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProject $request)
    {
        $page = new Project();
        $page->name = $request->get('name');
        $page->title = $request->get('title');
        $page->content = $request->get('content');

        if(! $request->has('parent') )
            $page->parent = 'projects';

        $page->save();

        return Redirect(route('project.edit', $page));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return (new ProjectController())->show($project->parent, $project);
        //return Redirect(route('project', [$project->parent, $project->name]));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data = [
            'page' => $project,
        ];

        return view('project.edit')->with($data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProject $request, Project $project)
    {
        if ( $request->has('status') )
            $project->status = $request->get('status');

        if ( $request->has('cover') )
            $project->cover = Storage::putFile('covers',
                new File($request->cover, 'public')
            );

        if ( $request->has('title') ) {
            $project->name = $request->get('name');
            $project->title = $request->get('title');
            $project->content = $request->get('content');
            $project->parent = $request->get('parent');
        }

        $project->save();

        if ( $request->has('view') )
            return Redirect(
                route('project', [
                    'name' => $project->parent,
                    'project' => $project->name
                ])
            );

        return Redirect(route('project.edit', $project));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}

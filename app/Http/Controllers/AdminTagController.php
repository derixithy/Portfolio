<?php

namespace App\Http\Controllers;

use App\Tag;
//use Illuminate\Http\Request;
use App\Http\Requests\ValidateProject;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminTagController extends Controller
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
            'title' => 'Tags',
            'tags' => Tag::list()->get(),
        ];



        return view('tag.index')->with($data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProject $request)
    {
        $tag = new Tag();
        $tag->name = $request->get('name');
        $tag->title = $request->get('title');

        $tag->save();

        return Redirect(route('tag.edit', $tag));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return (new TagController())->show($tag->id, $tag);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $data = [
            'tag' => $tag,
        ];

        return view('tag.edit')->with($data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProject $request, Tag $tag)
    {
        $tag->name = $request->get('name');
        $tag->title = $request->get('title');

        $tag->save();

        return Redirect(route('tag.edit', $tag));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $tag)
    {
        //
    }
}

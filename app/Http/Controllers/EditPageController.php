<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ValidatePage;

class EditPageController extends Controller
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
            'pages' => Page::list()->get(),
        ];


        return view('page.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePage $request)
    {
        $page = new Page();
        $page->name = $request->get('name');
        $page->title = $request->get('title');
        $page->content = $request->get('content');
        $page->save();

        return Redirect(route('page.edit', $page));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {

        return (new PageController())->show($page->name, $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $data = [
            'page' => $page,
        ];

        return view('page.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePage $request, Page $page)
    {
        if ( $request->has('status') )
            $page->status = $request->get('status');
        else {
            $page->name = $request->get('name');
            $page->title = $request->get('title');
            $page->content = $request->get('content');
        }
        $page->save();

        if ( $request->has('view') )
            return Redirect(route('page', $page->name));

        return Redirect(route('page.edit', $page));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}

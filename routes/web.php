<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@show');


//Auth::routes(['register' => false]);
Auth::routes();



Route::get('{name}.html', 'PageController@show')
	->where('name', '[A-Za-z]+')
	->name('page');

    Route::get('{name}/{project}', 'ProjectController@show')
	->where('name', '[A-Za-z]+')
	->where('project', '[A-Za-z]+')
	->name('project');

Route::get('tag/{name}.html', 'TagController@show')
	->where('name', '[A-Za-z]+')
	->name('tag');

Route::match(['get', 'post'], '/zoek.html', 'SearchController@show')
	->name('search');


/*
 *
 * Admin
 ****************************************************************/
Route::prefix('admin',)->group(function(){
	Route::resources([
	    'page' => 'EditPageController',
	    'project' => 'EditProjectController',
	    'user' => 'EditUserController',
	    'tag' => 'EditTagController'
	]);
});//->middleware('auth');


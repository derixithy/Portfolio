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




Route::match(['get', 'post'], '/zoek.html', 'SearchController@show')
	->name('search');

Route::get('tagged/{name}.html', 'TagController@show')
	->where('name', '[A-Za-z]+')
	->name('tag');

Route::get('{name}.html', 'PageController@show')
	->where('name', '[A-Za-z]+')
	->name('page');

    Route::get('{name}/{project}.html', 'ProjectController@show')
	->where('name', '[A-Za-z]+')
	->where('project', '[A-Za-z]+')
	->name('project');


/*
 *
 * Admin
 ****************************************************************/
Route::prefix('admin')->group(function(){
	Route::resources([
	    'page' => 'AdminPageController',
	    'project' => 'AdminProjectController',
	    'user' => 'AdminUserController',
	    'tag' => 'AdminTagController',
	    'trash' => 'TrashController'
	]);
});//->middleware('auth');


<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});


/**
 * Routes for the GTD controller. Explicit routes so as to avoid error
 * handling in the controller methods.
 */

Route::get('gtd/todo/(:num)/delete',	'gtd.todo@todo_delete');
Route::get('gtd/todo/(:num)/edit',		'gtd.todo@todo_edit');
Route::post('gtd/todo/(:num)/edit',		'gtd.todo@todo_update');
Route::get('gtd/todo/(:num)',			'gtd.todo@todo_view');
Route::get('gtd/todo/new/(:num?)',		'gtd.todo@todo_create');
Route::post('gtd/todo/new',				'gtd.todo@todo_update');
Route::get('gtd/todo',					'gtd.todo@todo_list');

Route::get('gtd/project/(:num)/delete',	'gtd.project@project_delete');
Route::get('gtd/project/(:num)/edit',	'gtd.project@project_edit');
Route::post('gtd/project/(:num)/edit',	'gtd.project@project_update');
Route::get('gtd/project/(:num)',		'gtd.project@project_view');
Route::get('gtd/project/new',			'gtd.project@project_create');
Route::post('gtd/project/new',			'gtd.project@project_update');
Route::get('gtd/project',				'gtd.project@project_list');

Route::get('gtd/status/(:num)/delete',	'gtd.status@status_delete');
Route::get('gtd/status/(:num)/edit',	'gtd.status@status_edit');
Route::post('gtd/status/(:num)/edit',	'gtd.status@status_update');
Route::get('gtd/status/(:num)',			'gtd.status@status_view');
Route::get('gtd/status/new',			'gtd.status@status_create');
Route::post('gtd/status/new',			'gtd.status@status_update');
Route::get('gtd/status',				'gtd.status@status_list');

Route::get('gtd/context/(:num)/delete',	'gtd.context@context_delete');
Route::get('gtd/context/(:num)/edit',	'gtd.context@context_edit');
Route::post('gtd/context/(:num)/edit',	'gtd.context@context_update');
Route::get('gtd/context/(:num)',		'gtd.context@context_view');
Route::get('gtd/context/new',			'gtd.context@context_create');
Route::post('gtd/context/new',			'gtd.context@context_update');
Route::get('gtd/context',				'gtd.context@context_list');

Route::get('gtd',						'gtd@index');

/**
 * View composers.
 */

// The sidebar contains a list of all projects.
View::composer('gtd.projects', function ($view)
{
    $view->with('projects', Ruck\Project::all());
});

// The Todo form needs all the projects, statuses and contexts available to it.
View::composer('gtd.todo.form', function ($view)
{
    $view
    	->with('projects', Ruck\Project::all())
    	->with('statuses', Ruck\Status::where_type('todo')->get())
    	->with('contexts', Ruck\Context::all());
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
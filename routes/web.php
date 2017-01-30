<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Frontend */

Route::get('/g', function () {
    return view('Testing Page');
});
Route::get('/', 'Frontend\HomeController@index');
Route::get('/animations', 'Frontend\AnimationsController@index');
Route::get('/movies', 'Frontend\moviesController@index');
Route::get('/allmovies/movies.html', 'Frontend\MoviesController@allmovies');
Route::get('/animations/animations.html', 'Frontend\MoviesController@animations');
Route::get('/moviesfilm/moviesfilm.html', 'Frontend\MoviesController@hmovies');
Route::get('/search_result', 'Frontend\MoviesController@search_result');
Route::get('/add_today', 'Frontend\MoviesController@add_today');
Route::get('/news', 'Frontend\NewsController@index');
Route::get('/singlenews/{id}', 'Frontend\NewsController@singlenews');
Route::get('/faqs.html', function () {
    return view('pages.faq');
});
Route::get('/contact-us.html', function () {
    return view('pages.contact-us');
});
Route::get('/login/test1', function () {
    return view('admin.login');
});
/*Route::get('/post', 'PostController@index');*/
Route::get('/post/{id}/movie.html', 'Frontend\SingleController@show');
Route::post('/subscribers/send.html', 'Frontend\SubscribersController@send');


//

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Admin Login*/
Route::post('/logout', 'LoginController@postLogout');
Route::get('/manager', 'ManagerController@index')->middleware('manager');
Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');

//group
Route::group(['middleware'=> 'visitors'], function(){
	Route::get('/register', 'RegistrationController@register');
	Route::post('/register', 'RegistrationController@postRegister');
	Route::get('/login', 'LoginController@login');
	Route::post('/login', 'LoginController@postLogin');	
	
});





/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Test*/


Route::group(['middleware' => ['admin']], function() {
  	Route::get('cms', 'Admin\AdminController@index');
  	Route::resource('/cms/slides', 'Admin\SlidesController');
	Route::resource('movieslist', 'Test\MovieslistController');
	Route::get('/create/search', 'Test\MovieslistController@search_result');
	Route::resource('/cms/news', 'Admin\NewsController'); 
	Route::resource('/cms/trailers', 'Admin\TrailersController');
}); /*This hided because template is not attractive*/
Route::get('/signintest', function () {
    return view('test.login');
});
Route::resource('/genres', 'Admin\GenresController');
Route::resource('/cms/resolutions', 'Admin\ResolutionsController');
Route::resource('/cms/statuses', 'Admin\StatusesController');
Route::resource('/cms/movies', 'Admin\MoviesController');

//404 page
Route::get('/pagenotfound', ['as'=>'notfound', 'uses'=>'RedirectController@index']);
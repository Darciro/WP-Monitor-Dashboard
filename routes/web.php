<?php

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

Route::get('/', 'DashboardController@index');

Route::get('/sites/{id}/delete', 'SitesController@delete');
Route::resource('/sites', 'SitesController');

Route::get('/about', function () {
    $title = 'Sobre';
    $dashboard_main_color = 'green';
    return view('about', compact('title', 'dashboard_main_color') );
});

/*Route::get('/', function () {
    return view('home');
});*/
Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/');
});
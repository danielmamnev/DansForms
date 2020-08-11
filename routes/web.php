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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forms', 'FormController@index')->name('forms');

Route::get('/form/new', 'FormController@new')->name('new-form');
Route::post('/form/new', 'FormController@store')->name('insert-form');
Route::get('/form/view/{id}', 'FormController@view')->name('view-form');
Route::get('/form/view/{id}/submissions', 'FormController@viewSubmissions')->name('view-form-submissions');
Route::get('/form/view/{id}/submissions/{sid}', 'FormController@viewSubInput')->name('view-form-input');



Route::get('/{username}/form/{formname}', 'PublicFormsController@view')->name('public-view-form');
Route::any('/form/submit', 'PublicFormsController@submit')->name('public-form-submit');

Route::get('/form/edit/{id}', 'FormController@edit')->name('edit-form');
Route::post('/form/edit/{id}', 'FormController@update')->name('update-form');
Route::get('/form/delete/{id}', 'FormController@delete')->name('delete-form');
Route::post('/form/delete/{id}', 'FormController@destroy')->name('destroy-form');

// Route::get('/form/view/{id}/export', 'FormController@export');








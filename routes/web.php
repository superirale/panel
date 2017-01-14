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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/home', 'UploadController@create');
Route::post('/upload', 'UploadController@ImageUpload');

Route::resource('images', 'ImagesController');
Route::resource('services', 'ServicesController');
Route::resource('user-services', 'UserServicesController');

Route::get('/crm', 'CrmController@index');
// Route::resource('/api/contacts', 'ContactsController');
Route::resource('contacts', 'ContactsController');
Route::resource('contacts/import', 'FileController@index');
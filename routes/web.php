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

// Route::get('/', function () {
//     return view('welcome');
// });

//Test die route for category
Route::get('/category' , 'ItemCategoriesController@categories_list');

//Test die route for item type and subtype
Route::get('/type' , 'ItemTypesController@getAllTypes');
Route::get('/subtype' , 'ItemSubtypesController@getAllSubtypes');
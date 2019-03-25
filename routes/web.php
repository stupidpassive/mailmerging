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

Route::get('/','MainController@index');
Route::post('/datasource/tableselected','MainController@tableSelected');
Route::post('/datasource/submit','MainController@submitDatasource');

//template
Route::get('/createtemplate','TemplateController@index');
Route::post('/createtemplate/datasourceselected','TemplateController@datasourceSelected');
Route::post('/createtemplate/submit','TemplateController@create');

//generate
Route::get('/menugenerate','GenerateController@index');
Route::post('/menugenerate/templateselected','GenerateController@templateSelected');

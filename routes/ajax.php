<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('get_incomes', 'Api\DataTableController@get_incomes')->name('ajax.get_incomes');
Route::get('get_irrincomes', 'Api\DataTableController@get_irrincomes')->name('ajax.get_irrincomes');

Route::get('get_expanse', 'Api\DataTableController@get_expanse')->name('ajax.get_expanse');
Route::get('get_irrexpanse', 'Api\DataTableController@get_irrexpanse')->name('ajax.get_irrexpanse');

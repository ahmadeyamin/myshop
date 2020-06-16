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
Route::get('/', 'HomeController@index')->name('home');


Route::get('/yt', function()
{
    $vid = 'SD4Z8dlZPd8'; // Youtube video ID
    // $vformat = $_GET['vformat']; // The MIME type of the video. e.g. video/mp4, video/webm, etc.
    parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$vid),$info);
    return $streams = $info;
});



Auth::routes();
Route::group(['middleware' => ['auth'],'prefix'=>'admin','as'=>'admin.'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/income/{id?}', 'Backend\Admin\IncExpController@income')->name('income');
    Route::put('/income/create', 'Backend\Admin\IncExpController@create')->name('income.create');
    Route::match(['get','put'],'income/{incandexp}/edit', 'Backend\Admin\IncExpController@edit')->name('income.edit');
    Route::delete('/income/{incandexp}', 'Backend\Admin\IncExpController@destroy')->name('income.delete');



    Route::get('/irrincome/{id?}', 'Backend\Admin\IncExpController@irrincome')->name('irrincome');
    Route::put('/irrincome/create', 'Backend\Admin\IncExpController@irrcreate')->name('irrincome.create');
    Route::match(['get','put'],'irrincome/{incandexp}/edit', 'Backend\Admin\IncExpController@irredit')->name('irrincome.edit');
    Route::delete('/irrincome/{incandexp}', 'Backend\Admin\IncExpController@irrdestroy')->name('irrincome.delete');



    Route::get('/expanse/{id?}', 'Backend\Admin\IncExpController@expanse')->name('expanse');
    Route::put('/expanse/create', 'Backend\Admin\IncExpController@expansecreate')->name('expanse.create');
    Route::match(['get','put'],'expanse/{incandexp}/edit', 'Backend\Admin\IncExpController@expanseedit')->name('expanse.edit');
    Route::delete('/expanse/{incandexp}', 'Backend\Admin\IncExpController@expansedestroy')->name('expanse.delete');




    Route::get('/irrexpanse/{id?}', 'Backend\Admin\IncExpController@irrexpanse')->name('irrexpanse');
    Route::put('/irrexpanse/create', 'Backend\Admin\IncExpController@irrexpansecreate')->name('irrexpanse.create');
    Route::match(['get','put'],'irrexpanse/{incandexp}/edit', 'Backend\Admin\IncExpController@irrexpanseedit')->name('irrexpanse.edit');
    Route::delete('/irrexpanse/{incandexp}', 'Backend\Admin\IncExpController@irrexpansedestroy')->name('irrexpanse.delete');



    Route::get('/product', 'Backend\Admin\ProductController@index')->name('product');
    Route::match(['get','put'],'/product/create', 'Backend\Admin\ProductController@create')->name('product.create');
    Route::match(['get','put'],'/product/{product}/edit', 'Backend\Admin\ProductController@edit')->name('product.edit');
    Route::delete('/product/{product}', 'Backend\Admin\ProductController@destroy')->name('product.delete');
});

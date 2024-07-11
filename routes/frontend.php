<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view ('frontend.partials.app');
});
Route::get('mitrakerjasamaDetail/{id}', 'frontendController@mitrakerjasamaDetail')->name('mitrakerjasamaDetail');
Route::get('mitrakerjasamaAll', 'frontendController@mitrakerjasamaAll')->name('mitrakerjasamaAll');
Route::get('cari', 'frontendController@cari');
Route::get('caridetail/{id}', 'frontendController@caridetail');
Route::get('chart/{id}', 'frontendController@chart');
Route::get('export/{id}', 'frontendController@export');
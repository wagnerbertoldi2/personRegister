<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginJwtController;
use App\Http\Controllers\ApiController;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginJwtController@login')->name('login');
    Route::post('/logout', 'LoginJwtController@logout')->name('logout');
});

//Route::group(['middleware' => ['jwt.auth']], function(){
    Route::post('cadastro','ApiController@setPessoa');
    Route::get('visualizar','ApiController@getPessoa');
    Route::post('filtrar','ApiController@getPessoaFiltro');
//});

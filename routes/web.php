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

Route::get('/',function () {
    return view('index');
})->name('home');

Route::get('pagar',function () {
    return view('pagar');
})->name('pagar');

Route::group(['prefix' => 'data'], function(){
    Route::get('getCategorias', ['uses' => 'CategoriasController@getData', 'as' => 'categorias.data']);
    Route::get('getCategoriasGlobales', ['uses' => 'CategoriasGlobalesController@getData', 'as' => 'categoriasglobales.data']);
    Route::get('getTallas', ['uses' => 'TallasController@getData', 'as' => 'tallas.data']);
    Route::get('getClientes', ['uses' => 'ClientesController@getData', 'as' => 'clientes.data']);
    Route::get('getProveedores', ['uses' => 'ProveedoresController@getData', 'as' => 'proveedores.data']);
    Route::get('getObligaciones', ['uses' => 'ObligacionesController@getData', 'as' => 'obligaciones.data']);
    Route::get('getReferencias', ['uses' => 'ReferenciasController@getData', 'as' => 'referencias.data']);
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('categorias','CategoriasController', ['except' => ['create','edit','show']]);
    Route::resource('categoriasglobales','CategoriasGlobalesController', ['except' => ['create','edit','show']]);
    Route::resource('categoriasRelaciones','CategoriasRelacionesController', ['only' => ['show','store']]);
    Route::resource('clientes','ClientesController', ['except' => ['create','edit','show']]);
    Route::resource('gastos','GastosController', ['except' => ['create','edit','show']]);
    Route::resource('obligaciones','ObligacionesController', ['except' => ['create','edit','show']]);
    Route::resource('proveedores','ProveedoresController', ['except' => ['create','edit','show']]);
    Route::resource('referencias','ReferenciasController', ['except' => ['create','edit','show']]);
    Route::resource('tallas','TallasController', ['except' => ['create','edit','show']]);
    
    Route::get('categoriasglobales/{id}/destroy',[
        'uses' => 'CategoriasGlobalesController@destroy',
        'as'   => 'categoriasglobales.destroy']
    );

    Route::get('categorias/{id}/destroy',[
        'uses' => 'CategoriasController@destroy',
        'as'   => 'categorias.destroy']
    );
});
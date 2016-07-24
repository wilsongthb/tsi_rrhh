<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('principal');
});

Route::group(["prefix" => "monedas"], function(){
    Route::get('','c_moneda@index');
    Route::get("crear","c_moneda@create");
    Route::post("crear","c_moneda@store");
    Route::get('editar/{id}','c_moneda@edit');
    Route::post("editar/{id}","c_moneda@update");
    Route::get("eliminar/{id}","c_moneda@destroy");
});

Route::group(["prefix" => "ingresos"], function(){
    Route::get('','c_ingreso@index');
    Route::get("crear","c_ingreso@create");
    Route::post("crear","c_ingreso@store");
    Route::get('editar/{id}','c_ingreso@edit');
    Route::post("editar/{id}","c_ingreso@update");
    Route::get("eliminar/{id}","c_ingreso@destroy");
});

Route::group(["prefix" => "descuentos"], function(){
    Route::get('','c_descuento@index');
    Route::get("crear","c_descuento@create");
    Route::post("crear","c_descuento@store");
    Route::get('editar/{id}','c_descuento@edit');
    Route::post("editar/{id}","c_descuento@update");
    Route::get("eliminar/{id}","c_descuento@destroy");
});

Route::group(["prefix" => "aportes"], function(){
    Route::get('','c_aporte@index');
    Route::get("crear","c_aporte@create");
    Route::post("crear","c_aporte@store");
    Route::get('editar/{id}','c_aporte@edit');
    Route::post("editar/{id}","c_aporte@update");
    Route::get("eliminar/{id}","c_aporte@destroy");
});

Route::group(["prefix" => "perfilpago"], function(){
    Route::get('','c_perfilpago@index');
    Route::get("crear","c_perfilpago@create");
    Route::post("crear","c_perfilpago@store");
    Route::get('editar/{id}','c_perfilpago@edit');
    Route::post("editar/{id}","c_perfilpago@update");
    Route::get("eliminar/{id}","c_perfilpago@destroy");
});

Route::group(["prefix" => "listaingresos"], function(){
    Route::get("crear","c_listaingresos@create");
    Route::get("crear/{id}","c_listaingresos@agregar");
    Route::post("crear","c_listaingresos@store");
    Route::get("editar/{id}","c_listaingresos@edit");
    Route::post("editar/{id}","c_listaingresos@update");
    Route::get("eliminar/{id}","c_listaingresos@destroy");
});

Route::group(["prefix" => "listadescuentos"], function(){
    Route::get("crear","c_listadescuentos@create");
    Route::get("crear/{id}","c_listadescuentos@agregar");
    Route::post("crear","c_listadescuentos@store");
    Route::get("editar/{id}","c_listadescuentos@edit");
    Route::post("editar/{id}","c_listadescuentos@update");
    Route::get("eliminar/{id}","c_listadescuentos@destroy");
});

Route::group(["prefix" => "listaaportes"], function(){
    Route::get("crear","c_listaaportes@create");
    Route::get("crear/{id}","c_listaaportes@agregar");
    Route::post("crear","c_listaaportes@store");
    Route::get("editar/{id}","c_listaaportes@edit");
    Route::post("editar/{id}","c_listaaportes@update");
    Route::get("eliminar/{id}","c_listaaportes@destroy");
});


/*rutas para remuneraciones*/

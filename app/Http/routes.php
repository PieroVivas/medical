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

//WEB PRINCIPAL
Route::get('/', function () {
          return view('auth.login');
});


Route::get('/login', function () {
    return view('auth.login');
});

// FIN WEB PRINCIPAL

Route::auth();

Route::get('/dashboard-administrador', 'HomeController@index');
Route::get('/dashboard-administrador/{anioconsulta}', 'HomeController@consultar_anio');

Route::get('/roles',  'TrabajadoreController@roles');


Route::resource('/trabajadores', 'TrabajadoreController');
Route::delete('eliminar_trabajador', 'TrabajadoreController@eliminar_trabajador');
Route::post('agregar_trabajador', 'TrabajadoreController@store');
Route::post('editar_trabajador', 'TrabajadoreController@update');


Route::resource('/categorias', 'CategoriaController');
Route::delete('eliminar_categoria', 'CategoriaController@eliminar_categoria');
Route::post('agregar_categoria', 'CategoriaController@store');
Route::post('editar_categoria', 'CategoriaController@update');


Route::resource('/marcas', 'MarcaController');
Route::delete('eliminar_marca', 'MarcaController@eliminar_marca');
Route::post('agregar_marca', 'MarcaController@store');
Route::post('editar_marca', 'MarcaController@update');


Route::resource('/medidas', 'MedidaController');
Route::delete('eliminar_medida', 'MedidaController@eliminar_medida');
Route::post('agregar_medida', 'MedidaController@store');
Route::post('editar_medida', 'MedidaController@update');


Route::resource('/tipos', 'TipoController');
Route::delete('eliminar_tipo', 'TipoController@eliminar_tipo');
Route::post('agregar_tipo', 'TipoController@store');
Route::post('editar_tipo', 'TipoController@update');


Route::resource('/proveedores', 'ProveedoreController');
Route::delete('eliminar_proveedor', 'ProveedoreController@eliminar_proveedor');
Route::post('agregar_proveedor', 'ProveedoreController@store');
Route::post('editar_proveedor', 'ProveedoreController@update');


Route::resource('/productos', 'ProductoController');
Route::delete('eliminar_producto', 'ProductoController@eliminar_producto');
Route::post('agregar_producto', 'ProductoController@store');
Route::post('editar_producto', 'ProductoController@update');

Route::resource('/clientes', 'ClienteController');
Route::delete('eliminar_cliente', 'ClienteController@eliminar_cliente');
Route::post('agregar_cliente', 'ClienteController@store');
Route::post('editar_cliente', 'ClienteController@update');

Route::resource('/entradas', 'EntradaController');
Route::post('agregar_entrada', 'EntradaController@store');
Route::post('editar_entrada', 'EntradaController@update');
Route::delete('eliminar_entrada', 'EntradaController@eliminar_entrada');
Route::get('entradas/productos/{id_producto}/{id_entrada}', 'EntradaController@entrada');
Route::post('agregar_detalle_entrada', 'EntradaController@agregar_detalle_entrada');
Route::delete('eliminar_detalle_entrada', 'EntradaController@eliminar_detalle_entrada');


Route::resource('/estados', 'EstadoController');
Route::post('agregar_estado', 'EstadoController@store');
Route::post('editar_estado', 'EstadoController@update');
Route::delete('eliminar_estado', 'EstadoController@eliminar_estado');


Route::resource('/salidas', 'SalidaController');
Route::post('agregar_salida', 'SalidaController@store');
Route::post('editar_salida', 'SalidaController@update');
Route::delete('eliminar_salida', 'SalidaController@eliminar_salida');
Route::get('salidas/productos/{id_producto}/{id_salida}', 'SalidaController@salida');
Route::post('agregar_detalle_salida', 'SalidaController@agregar_detalle_salida');
Route::delete('eliminar_detalle_salida', 'SalidaController@eliminar_detalle_salida');
Route::get('mensajes/{id_salida}', 'SalidaController@mensajes');
Route::get('/inventario', 'SalidaController@inventario');
Route::get('/indicador2', 'SalidaController@indicador2');


Route::get('/indicador_cumplimiento/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_cumplimiento');
Route::get('/indicador_ganancia/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_ganancia');
Route::get('/indicador_ganancia_consolidado/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_ganancia_consolidado');

Route::get('/indicador_empleado/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_empleado');
Route::get('/indicador_calidad/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_calidad');
Route::get('/indicador_ingreso/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_ingreso');
Route::get('/indicador_salida/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_salida');
Route::get('/indicador_volumen/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_volumen');
Route::get('/indicador_incidencia/{fecha_inicial}/{fecha_final}', 'SalidaController@indicador_incidencia');

Route::get('/reporte_producto/{fecha_inicial}/{fecha_final}/{id_producto}', 'SalidaController@reporte_producto');
Route::get('/reporte_categoria/{fecha_inicial}/{fecha_final}/{id_categoria}', 'SalidaController@reporte_categoria');
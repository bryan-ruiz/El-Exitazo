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
    return view('auth/login');
});


//post
Route::post('/crear/entrada', 'InventoryController@createInComing');
Route::post('/crear/salida', 'InventoryController@createOutComing');

Route::post('/crear/cliente', 'InventoryController@createClient');
Route::post('/crear/producto', 'InventoryController@createClient');
Route::post('/crear/departamento', 'InventoryController@createDepartment');


//Put
Route::put('/modificar/cliente/{id}', 'CustomerController@update');
Route::put('/modificar/departamento/{id}', 'CustomerController@update');
Route::put('/modificar/producto/{id}', 'CustomerController@update');

//Delete
Route::get('/eliminar/cliente/{id}', 'CustomerController@destroy');
Route::get('/eliminar/departamento/{id}', 'DepartmentController@destroy');
Route::get('/eliminar/producto/{id}', 'ProductController@destroy');
Route::get('/eliminar/entrada/{id}', 'CustomerController@destroy');
Route::get('/eliminar/salida/{id}', 'CustomerController@destroy');
Route::get('/eliminar/promocion/{id}', 'CustomerController@destroy');




//Main views
Route::get('/clientes', 'InventoryController@customerView');
Route::get('/departamento', 'InventoryController@departmentView');
Route::get('/estadoDeCuenta', 'CustomerController@accountStatusView');
Route::get('/inventario', 'InventoryController@index');
Route::get('/promocion', 'InventoryController@promotionView');
Route::get('/reporteDeInventario', 'InventoryController@inventoryReportView');
Route::get('/reporteDeMovimiento', 'InventoryController@movementReportView');
Route::get('/entradas', 'InventoryController@inComingView');
Route::get('/salidas', 'InventoryController@outComingView');
Route::get('/tiqueteVentasDevoluciones', 'InventoryController@billSalesAndReturnsInfoView');
Route::get('/ventasDevoluciones', 'InventoryController@salesAndReturnsView');
Route::get('/ventas', 'InventoryController@sellingView');
Route::get('/ventasPorPeriodo', 'InventoryController@sellingPeriodView');

//Create - Update views
Route::get('/crearAbono', 'CustomerController@paymentToAccountView');
Route::get('/crearCliente', 'CustomerController@index');
Route::get('/crearDepartamento', 'DepartmentController@index');
Route::get('/crearEntrada', 'InventoryController@createInComingView');
Route::get('/crearProducto', 'ProductController@index');
Route::get('/crearPromocion', 'PromotionController@index');
Route::get('/crearSalida', 'InventoryController@createOutComingView');

//CreateMethod
Route::put('user/{id}', 'UserController@update');

Auth::routes();

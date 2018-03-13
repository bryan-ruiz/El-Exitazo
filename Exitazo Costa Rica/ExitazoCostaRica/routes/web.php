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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

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
Route::get('/ventasDevoluciones', 'InventoryController@salesAndReturnsView');


Route::get('/ventas', 'InventoryController@sellingView');
Route::get('/ventasPorPeriodo', 'InventoryController@sellingPeriodView');
//Create views
Route::get('/crearAbono', 'CustomerController@paymentToAccountView');
Route::get('/crearCliente', 'CustomerController@index');
Route::get('/crearDepartamento', 'DepartmentController@index');
Route::get('/crearEntrada', 'InventoryController@createInComingView');
Route::get('/crearProducto', 'ProductController@index');
Route::get('/crearPromocion', 'PromotionController@index');
Route::get('/crearSalida', 'InventoryController@createOutComingView');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

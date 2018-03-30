<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;

class InventoryController extends Controller
{
    /**
     * Display the product list and main view of inventories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::table('PRODUCTOS')->select('codigoProducto', 'descripcion','precioCosto','precioVenta','precioMayoreo',
            'nombreDepartamento','cantidadDeProduct','cantMinimaProd')->get();
        //echo $productos;
        //return $productos;
        return view('inventories', compact('productos'));
    }

    public function customerView()
    {
        return view('customers');
    }

    public function createOutComingView()
    {
        return view('createOutComing');
    }

    public function createInComingView()
    {
        return view('createInComing');
    }

    public function departmentView()
    {
        return view('departments');
    }

    public function sellingPeriodView()
    {
        return view('sellingPeriod');
    }

    public function salesAndReturnsView()
    {
        return view('salesAndReturns');
    }

    public function billSalesAndReturnsInfoView()
    {
        return view('billSalesAndReturnsInfo');
    }
    

    public function promotionView()
    {
        return view('promotions');
    }

    public function inventoryReportView()
    {
        return view('inventoryReport');
    }

    public function sellingView()
    {
        return view('selling');
    }

    public function movementReportView()
    {
        return view('movementReport');
    }

    public function outComingView()
    {
        return view('outComing');
    }

    public function inComingView()
    {
        return view('inComing');
    }
    
}

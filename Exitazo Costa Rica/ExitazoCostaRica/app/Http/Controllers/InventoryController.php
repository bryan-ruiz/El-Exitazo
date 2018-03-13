<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display the product list and main view of inventories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventories');
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

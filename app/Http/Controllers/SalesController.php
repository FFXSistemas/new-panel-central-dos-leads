<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SalesRepository;

class SalesController extends Controller
{

    /**
     * @return mixed
     */
    public function auditSales()
    {
        $sales = (new SalesRepository())->auditSalesTable();
        return view('pages.sales.all')
            ->withSales($sales);
    }

    /**
     * @return mixed
     */
    public function approvedSales()
    {
        $sales = (new SalesRepository())->approvedSalesTable();
        return view('pages.sales.approved')
            ->withSales($sales);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.sales.create');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function view($id)
    {
        $sale = (new SalesRepository())->getSale($id);
        return view('pages.sales.view')
            ->withSale($sale);
    }


}
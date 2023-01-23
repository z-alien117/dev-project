<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::select('id','name','price');
        return DataTables::eloquent($products)
            ->addColumn('options',function($products){
                return
                "
                <button type='submit' class='btn btn-warning btn_edit' data-toggle='tooltip' title='Editar' data-original-title='Editar' get_url='". route('functions.edit_product', ['product'=>$products->id]) ."'><i class='icon-line-edit-2'></i> Edit</button>
                <button type='submit' class='btn btn-danger btn_delete' data-toggle='tooltip' title='Eliminar' data-original-title='Eliminar' delete_url='". route('functions.delete_product', ['product'=>$products->id]) ."'><i class='icon-trash2'></i> Delete</button>
                ";
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('products.form')->render();
        return response()->json([
            "status"=>"successful",
            "view"=>$view
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}

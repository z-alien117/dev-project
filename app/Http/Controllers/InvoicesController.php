<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoices::select('id','Date','ClientId');
        return DataTables::eloquent($invoices)
            ->addColumn('Client',function($invoices){
                return $invoices->Client->Name;
            })
            ->addColumn('options',function($invoices){
                return
                "
                <button type='submit' class='btn btn-warning btn_edit' data-toggle='tooltip' title='Editar' data-original-title='Editar' get_url='". route('functions.edit_invoice', ['invoice'=>$invoices->id]) ."'><i class='icon-line-edit-2'></i> Edit</button>
                <button type='submit' class='btn btn-danger btn_delete' data-toggle='tooltip' title='Eliminar' data-original-title='Eliminar' delete_url='". route('functions.delete_invoice', ['invoice'=>$invoices->id]) ."'><i class='icon-trash2'></i> Delete</button>
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
        $view = view('invoices.form', ['clients'=>Clients::all()])->render();
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
            'client'=>'required',
            'date'=>'required'
        ]);
        $date = Carbon::createFromFormat('m/d/Y G:i A', $request->date)->toDateTimeString();

        $invoice = new Invoices([
            'ClientId'=>$request->client,
            'Date'=>$date
        ]);

        $invoice->save();
        return response()->json($invoice, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices)
    {
        //
    }
}

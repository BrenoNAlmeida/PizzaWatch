<?php

namespace App\Http\Controllers;

use App\Models\Divida;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class DividaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function comfirmar_pagamento(Request $request)
    {
        $divida = Divida::find($request->id);
        $divida->paga = true;
        $divida->save();
        Alert::success("Pagamento Comfirmado");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Divida $divida)
    {
        return view('analisar_dividas',[
            'dividas' => Divida::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divida $divida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divida $divida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divida $divida)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Prova;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProvaController extends Controller
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
        //dd($request->all());
        $request->validate([
            'foto' => 'required|image|max:2048',
            'devedor'=>'required'
        ]);

        if ($request->hasFile('foto')) {
            $imagem = $request->file('foto');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('public', $nomeImagem);

            $prova = Prova::create(['foto'=>$request->foto, 'devedor_id'=>$request->devedor]);
            $prova->save();
        }
        return redirect(RouteServiceProvider::HOME);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Prova $prova)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prova $prova)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prova $prova)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prova $prova)
    {
        //
    }
}

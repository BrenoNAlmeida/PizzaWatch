<?php

namespace App\Http\Controllers;

use App\Models\Divida;
use App\Models\Prova;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provas = Prova::all();
        return view('provas', compact('provas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            
            $funcionarios = User::all();
            return view('cadastrar_prova', compact('funcionarios'));
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

            $prova = Prova::create(['foto'=>$nomeImagem, 'devedor_id'=>$request->devedor]);
            $prova->save();
        }
        Alert::success("Prova Cadastrada");
        return redirect(RouteServiceProvider::HOME);
    
    }

    public function confirmar_prova(Request $request)
    {
        $prova = Prova::find($request->id);
        $prova->Evalidado = true;
        $prova->save();

        $dividasDoDevedor = Divida::where('devedor_id',$prova->devedor_id)->get();

        //cria divida
        $divida = Divida::create(['devedor_id'=>$prova->devedor_id,
                        'prova_id'=>$prova->id, 
                        'pizza'=>true,
        ]);
        
        //verificar se é a terceira do mes pela data de criação das duas ultimas dele
        if($dividasDoDevedor->count() >= 2){
            $ultimaDivida = $dividasDoDevedor->last();
            $penultimaDivida = $dividasDoDevedor->reverse()->skip(1)->first();
            if($ultimaDivida->created_at->format('m') == $penultimaDivida->created_at->format('m')){
                $divida->refrigerante = true;
            }
        }
        $divida->save();


        //alerta para prova validada com sucesso
        Alert::success("Prova Verificada");
        return redirect(RouteServiceProvider::HOME);

    }

    /**
     * Display the specified resource.
     */
    public function show(Prova $prova)
    {
        return view('analisar_prova', compact('prova'));
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
    public function destroy(Request $request)
    {
        $prova = Prova::find($request->id);
        $prova->delete();
        Alert::success("Prova Recusada");
        return redirect(RouteServiceProvider::HOME);
    }
    
}

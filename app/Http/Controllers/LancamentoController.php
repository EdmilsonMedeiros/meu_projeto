<?php

namespace App\Http\Controllers;

use App\Models\Lancamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LancamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'descricao' => 'required',
            'valor' => 'required',
            'data' => 'required',
            'categoria_id' => 'required|integer'
        ];
        $feedbacks = [
            'required' => "Campo obrigatótio :attribute",
            'categoria_id.integer' => "Campo numerico"
        ];
        $request->validate($regras, $feedbacks);
        $request['user_id'] = Auth::user()->id;
        if(\App\Models\Lancamento::create($request->all())){
            return redirect()->back()->with('sucesso_lancamento', 'sucesso');
        }else{
            return redirect()->back()->with('erro_lancamento', 'erro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function show(Lancamento $lancamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Lancamento $lancamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lancamento $lancamento)
    {
        $regras = [
            'descricao' => 'required',
            'valor' => 'required',
            'data' => 'required',
            'categoria_id' => 'required|integer'
        ];
        $feedbacks = [
            'required' => "Campo obrigatótio :attribute",
            'categoria_id.integer' => "Campo numerico"
        ];
        $request->validate($regras, $feedbacks);
        $request['user_id'] = Auth::user()->id;
        if($lancamento->update($request->all())){
            return redirect()->back()->with('sucesso_lancamento', 'sucesso');
        }else{
            return redirect()->back()->with('erro_lancamento', 'erro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lancamento $lancamento)
    {
        if($lancamento->delete()){
            return redirect()->back()->with('sucesso_lancamento');
        }else{
            return redirect()->back()->with('erro_lancamento');
        }
    }
}

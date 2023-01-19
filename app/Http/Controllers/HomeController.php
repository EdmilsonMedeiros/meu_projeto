<?php

namespace App\Http\Controllers;

use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias_despesa = \App\Models\Categoria::wheretipo('Despesa')->whereuser_id(Auth::user()->id)->get();
        $categorias_receita = \App\Models\Categoria::wheretipo('Receita')->whereuser_id(Auth::user()->id)->get();
        
        $lancamentos        = \App\Models\Lancamento::whereuser_id(Auth::user()->id)->orderBy('ID', 'DESC')->whereBetween('data', [date('Y-m').'01', date('Y-m-t')])->get();

        $total_receita      = \App\Models\Lancamento::select(DB::raw('SUM(valor) as valor'))->whereuser_id(Auth::user()->id)->wheretipo('Receita')->get()[0]->valor;
        $total_despesa      = \App\Models\Lancamento::select(DB::raw('SUM(valor) as valor'))->whereuser_id(Auth::user()->id)->wheretipo('Despesa')->get()[0]->valor;
        $saldo_atual        = $total_receita - $total_despesa;

        return view('home', compact('categorias_despesa', 'categorias_receita', 'lancamentos', 'total_receita', 'total_despesa', 'saldo_atual'));
    }
}
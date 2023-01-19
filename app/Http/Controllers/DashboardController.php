<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $categorias_despesa = \App\Models\Categoria::wheretipo('Despesa')->whereuser_id(Auth::user()->id)->get();
        $categorias_receita = \App\Models\Categoria::wheretipo('Receita')->whereuser_id(Auth::user()->id)->get();

        return view('dashboard.index', compact('categorias_despesa', 'categorias_receita'));
    }
}

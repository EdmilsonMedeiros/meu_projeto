@extends('layouts.app')

@section('content')
@include('modals.add')
@include('modals.add_despesa')
@include('modals.add_categoria')

    <!-- Pre v1.0.0 versions need the minified css -->
    <link rel='stylesheet' href='https://unpkg.com/v-calendar/lib/v-calendar.min.css'>
    <!-- 1. Link Vue Javascript -->
    <script src='https://unpkg.com/vue/dist/vue.js'></script>

    <!-- 2. Link VCalendar Javascript (Plugin automatically installed) -->
    <script src='https://unpkg.com/v-calendar'></script>

    <!--3. Create the Vue instance-->
    <script>
        new Vue({
        el: '#app',
        data: {
            selectedDate: null,
        }
        })
    </script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title=""><img src="" alt=""> Home</a></li>
                <li class="nav-item"><a class="nav-link tooltip-arrow" title="Mais detalhes sobre seus lançamentos" href="{{ route('dashboard.index') }}" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title=""><img src="" alt=""> Dashboard</a></li>
            </ul>
        </div>
    </div>
    {{-- <br>
    <div class="row">
        <div class="">
            <div class="form-group form-filter">
                <div class="">
                    <form action="" method="POST">
                        <div class="col-5 col-sm-5 col-md-5 col-lg-5 inputs btn-group">
                            
                            <input type="date" class="form-control" id="data_1" name="data_1">
                        </div>
                        <div class="col-5 col-sm-5 col-md-5 col-lg-5 inputs btn-group">
                            
                            <input type="date" class="form-control" id="data_2" name="data_2">
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 inputs btn-group">
                            
                            <input type="submit" class="btn btn-primary" id="" name="" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <br>
    
    <div id='app'>
        <v-calendar></v-calendar>
        <v-date-picker v-model='selectedDate' />
    </div>

    <div class="container">
        <div class="row calendar-container">


            {{-- container-valores text-center --}}
            <div class="col-6 calendar">
                <h3 class="text-dark"><span class="arrow-back-calendar calendar-inline"><a href="" title="Retroceder" class="tooltip-arrow"><</a></span>{{ date('M/Y') }}<span class="arrow-next-calendar calendar-inline"><a href="" title="Avançar" class="tooltip-arrow">></a></span></h3>
            </div>
            <div class="col-6 ">
                <h3 class="text-success float-right tooltip-arrow" title="Saldo atual total">Saldo: {{ isset($saldo_atual) ? number_format($saldo_atual, 2, ',', '.') : '0,00' }}</h3>
            </div>
        </div>
        
    </div>
@php
    $sucesso = 'Operação realizada com sucesso';
    $erro = 'Falha na operação';
@endphp

    @if (Session::has('sucesso_lancamento'))
        <p class="text-success" style="background-color: black; padding:1em; font-weight: bold; border-radius: 0.3em;">{{ $sucesso }}</p>
    @endif
    @if (Session::has('erro_lancamento'))
        <p class="text-danger" style="background-color: black; padding:1em; font-weight: bold; border-radius: 0.3em;">{{ $erro }}</p>
    @endif
    @if (Session::has('sucesso_categoria'))
        <p class="text-success" style="background-color: black; padding:1em; font-weight: bold; border-radius: 0.3em;">{{ $sucesso }}</p>
    @endif
    @if (Session::has('erro_categoria'))
        <p class="text-danger" style="background-color: black; padding:1em; font-weight: bold; border-radius: 0.3em;">{{ $erro }}</p>
    @endif
    <div class="row btn-principal">
        <div class="col-12 btn-group">
            <button type="button" class="btn btn-warning btn-right right" data-bs-toggle="modal" data-bs-target="#add_categoria_modal">Adicionar Categoria</button>
            <button type="button" class="btn btn-danger btn-right right tooltip-arrow" title="Total geral em despesas" data-bs-toggle="modal" data-bs-target="#add_despesa_modal">Despesa
                <h3 class="text-light">{{ 'R$ ' . number_format($total_despesa, 2, ',', '.') }}</h3>
            </button>
            <button type="button" class="btn btn-success btn-right right tooltip-arrow" title="Total geral em receitas" data-bs-toggle="modal" data-bs-target="#add_modal">Receita
                <h3 class="text-light">{{ 'R$ ' . number_format($total_receita, 2, ',', '.') }}</h3>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="home-principal">
            @foreach ($lancamentos as $lancamento)
                <div class="card {{ isset($lancamento->tipo) && $lancamento->tipo == 'Receita' ? 'bg-success' : 'bg-danger' }} col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" style="border-radius:0px">
                    <div class="card-body">
                        {{-- <h5 class="card-title">{{ !is_null($lancamento->tipo) ? $lancamento->tipo : '' }}</h5> --}}
                        <h4 class="card-title title-valor text-center text-warning" id="title-valor">R$ {{ !is_null($lancamento->valor) ? number_format($lancamento->valor, 2, ',', '.') : '' }}</h4>
                        <div class="circle-lancamento" style="background-color: {{ !is_null($lancamento->categoria->cor) ? $lancamento->categoria->cor : '' }};">
                            
                        </div>
                        <p class="btn-card-group p-categoria">{{ !is_null($lancamento->categoria->nome) ? $lancamento->categoria->nome : '' }}</p>
                        <h6 class="card-subtitle mb-2 text-dark">{{ !is_null($lancamento->data) ? date('d/m/Y', strtotime($lancamento->data)) : '' }}</h6>
                        <p class="card-text">{{ !is_null($lancamento->descricao) ? $lancamento->descricao : '' }}</p>
                        <hr>
                        <div class="btn-card-group">
                            <form action="{{ route('lancamento.destroy', $lancamento->id) }}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-light card-link btn-card-group">Excuir</button>
                            </form>
                            <form action="" method="">
                                <button type="button" class="btn btn-light card-link btn-card-group" data-bs-toggle="modal" data-bs-target="#edit_modal_{{$lancamento->id}}">Editar</button>
                            </form>

                        </div>
                    </div>
                </div>
            @include('modals.edit_lancamento')
            @endforeach
        </div>
    </div>
</div>

@endsection

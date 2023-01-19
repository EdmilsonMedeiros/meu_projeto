@extends('layouts.app')

@section('content')
@include('modals.add')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Manutenções nos próximos 7 dias"><img src="" alt=""> Home</a></li>
                <li class="nav-item"><a class="nav-link active  " href="{{ route('home') }}" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Manutenções nos próximos 7 dias"><img src="" alt=""> Dashboard</a></li>
            </ul>
        </div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="">
            <div class="form-group form-filter">
                <div class="">
                    <form action="" method="POST">
                        <div class="col-5 col-sm-5 col-md-5 col-lg-5 inputs btn-group">
                            <label for=""></label>
                            <input type="date" class="form-control" id="data_1" name="data_1">
                        </div>
                        <div class="col-5 col-sm-5 col-md-5 col-lg-5 inputs btn-group">
                            <label for=""></label>
                            <input type="date" class="form-control" id="data_2" name="data_2">
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 inputs btn-group">
                            <label for=""></label>
                            <input type="submit" class="btn btn-primary" id="" name="" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br> --}}
    <div class="row">
        <div class="">
            <form action="" method="get">
                <div class="col-5 inputs btn-group">
                    <select class="form form-control">
                        <option selected disabled>Escolha o mês</option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
                <div class="col-5 inputs btn-group">
                    <select class="form form-control">
                        <option selected disabled>Escolha o ano</option>
                        <option value="1">2022</option>
                        <option value="2">2023</option>
                    </select>
                </div>
                <div class="col-2 inputs btn-group">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12 btn-group">
            <button type="button" class="btn btn-warning btn-right right">Adicionar</button>
            <button type="button" class="btn btn-danger btn-right right">Adicionar</button>
            <button type="button" class="btn btn-success btn-right right" data-bs-toggle="modal" data-bs-target="#add_modal">Adicionar</button>
        </div>
    </div> --}}
    <div class="row">
        <div class="home-principal">
            
            Dashboard
        
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:100px" />

        </div>
        <div class="col-sm-8">

            <h2><b>Nombre: </b>{{ $familiaProfesional->nombre }}</h2>
            <h4><b>Codigo: </b>{{ $familiaProfesional->codigo }}</h4>
@auth
            <a href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getEdit'], ['id'=>$familiaProfesional->id]) }}"
                class="button primary"> Editar
@endauth
            </a>
            <a href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getIndex']) }}"
                class="button primary"> Listado familias profesionales

            </a>
        </div>
    </div>
@endsection

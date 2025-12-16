@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:100px" />

        </div>
        <div class="col-sm-8">

            <h2><b>Nombre: </b>{{ $cicloFormativo['nombre'] }}</h2>
            <h4><b>Codigo: </b>{{ $cicloFormativo['codigo'] }}</h4>
            <h4><b>Grado: </b>{{ $cicloFormativo['grado'] }}</h4>
            <p><b>Descripción: </b>{{ $cicloFormativo['descripcion'] }}</p>

@auth
            <a href="{{ action([App\Http\Controllers\CiclosFormativosController::class, 'getEdit'], ['id' => $cicloFormativo->id]) }}"
               class="button primary">
               Editar
            </a>
@endauth

            <a href="{{ action([App\Http\Controllers\CiclosFormativosController::class, 'getIndex']) }}"
                class="button primary"> Listado ciclos formativos

            </a>


        </div>
    </div>
@endsection









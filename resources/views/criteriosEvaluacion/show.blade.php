@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:100px" />

        </div>
        <div class="col-sm-8">

            <h2><b>Codigo: </b>{{ $criterio->codigo }}</h2>
            <h4><b>Descripcion: </b>{{ $criterio->descripcion }}</h4>
@auth
            <a href="{{ action([App\Http\Controllers\CriteriosController::class, 'getEdit'], [$criterio->id]) }}"
                class="button primary"> Editar

            </a>
@endauth
            <a href="{{ action([App\Http\Controllers\CriteriosController::class, 'getIndex']) }}"
                class="button primary"> Listado Criterios Evaluacion

            </a>
        </div>
    </div>
@endsection

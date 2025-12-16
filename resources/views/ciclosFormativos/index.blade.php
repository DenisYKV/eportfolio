@extends('layouts.master')

@section('content')

    <div class="row">

    @foreach ($ciclos_formativos as $key => $cicloFormativo)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $cicloFormativo->familiaProfesionalId }}</h3>
            </header>
            <p>
                {{ $cicloFormativo->nombre }}
            </p>
            <p>
                {{ $cicloFormativo->codigo }}
            </p>
            <p>
                {{ $cicloFormativo->grado }}
            </p>
            <p>
                {{ $cicloFormativo->descripcion }}
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\CiclosFormativosController::class, 'getShow'], ['id' => $cicloFormativo->id]) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>

@stop

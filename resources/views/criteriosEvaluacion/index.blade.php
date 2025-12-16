@extends('layouts.master')

@section('content')

    <div class="row">

    @foreach ($criterios as $criterio)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $criterio->codigo }}</h3>
            </header>
            <p>
                {{ $criterio->descripcion }}
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\CriteriosController::class, 'getShow'], [$criterio->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>

@stop

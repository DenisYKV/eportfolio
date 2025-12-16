@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir Criterio Evaluacion
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ action([App\Http\Controllers\CriteriosController::class, 'postCreate']) }}"
                        method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" name="codigo" id="codigo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input type="text" name="orden" id="orden" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Criterio Evaluacion
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

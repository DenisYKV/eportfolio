@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar Resultado de Aprendizaje
                </div>

                <div class="card-body" style="padding:30px">


                    <form action="{{ action([App\Http\Controllers\ResultadosAprendizajesController::class, 'update'], ['id' => $resultado->id]) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="modulo_formativo_id">Módulo Formativo ID</label>
                            <input type="number"
                                   name="modulo_formativo_id"
                                   id="modulo_formativo_id"
                                   class="form-control"
                                   value="{{ $resultado->modulo_formativo_id }}">
                        </div>

                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text"
                                   name="codigo"
                                   id="codigo"
                                   class="form-control"
                                   value="{{ $resultado->codigo }}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion"
                                      id="descripcion"
                                      class="form-control">{{ $resultado->descripcion }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="peso_porcentaje">Peso (%)</label>
                            <input type="number"
                                   step="0.01"
                                   name="peso_porcentaje"
                                   id="peso_porcentaje"
                                   class="form-control"
                                   value="{{ $resultado->peso_porcentaje }}">
                        </div>

                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input type="number"
                                   name="orden"
                                   id="orden"
                                   class="form-control"
                                   value="{{ $resultado->orden }}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit"
                                    class="btn btn-primary"
                                    style="padding:8px 100px;margin-top:25px;">
                                Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

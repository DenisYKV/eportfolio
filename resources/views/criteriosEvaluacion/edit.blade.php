@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Criterio de Evaluacion
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\CriteriosController::class, 'update'], [$criterio->id]) }}" method="POST">

	            @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="codigo">Código</label>
	               <input type="text" name="codigo" id="codigo" class="form-control" value="{{$criterio->codigo }}">
	            </div>

	            <div class="form-group">
	            	<label for="nombre">Descripcion</label>
	               <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $criterio->descripcion }}">
	            </div>

                <div class="form-group">
	            	<label for="nombre">Orden</label>
	               <input type="text" name="orden" id="orden" class="form-control" value="{{ $criterio->orden }}">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar criterio de evaluacion
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection

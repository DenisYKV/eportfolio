@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir ciclo formativo
         </div>
         <div class="card-body" style="padding:30px">

                   <form action="{{ action([App\Http\Controllers\CiclosFormativosController::class, 'postCreate']) }}"
                        method="POST">
	            @csrf

	            <div class="form-group">
	               <label for="familiaProfesionalId">ID Familia Profesional</label>
	               <input type="text" name="familiaProfesionalId" id="familiaProfesionalId" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="nombre">Nombre</label>
	               <input type="text" name="nombre" id="nombre" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="codigo">Código</label>
	               <input type="text" name="codigo" id="codigo" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="grado">Grado</label>
	               <input type="text" name="grado" id="grado" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="descripcion">Descripción</label>
	               <input type="text" name="descripcion" id="descripcion" class="form-control">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir ciclo formativo
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection

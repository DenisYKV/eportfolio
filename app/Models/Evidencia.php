<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $table = 'evidencias';

    protected $fillable = [
    'estudiante_id',
    
    'tarea_id',
    'url',
    'descripcion',
    'estado_validacion',
];

}

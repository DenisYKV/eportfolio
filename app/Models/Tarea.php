<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = [
        'criterio_evaluacion_id',
        'fecha_apertura',
        'fecha_cierre',
        'activo',
        'enunciado',
    ];
}


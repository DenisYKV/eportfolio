<?php

namespace Database\Seeders;

use App\Models\CriterioEvaluacion;
use App\Models\CriterioTarea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriosTareasTableSeeder extends Seeder




{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CriterioTarea::truncate();

        foreach (self::$criteriosTarea as $criterioTarea) {
            $c = new CriterioTarea();

            $c->tarea_id = $criterioTarea['tarea_id'];
            $c->actividad_id = $criterioTarea['actividad_id'];


            $c->save();
        }
    }
    private static $criteriosTarea = [

    [
        'tarea_id' => 1,
        'actividad_id' => 1,
    ],
    [
        'tarea_id' => 1,
        'actividad_id' => 2,
    ],
    [
        'tarea_id' => 2,
        'actividad_id' => 1,
    ],
    [
        'tarea_id' => 2,
        'actividad_id' => 3,
    ],
    [
        'tarea_id' => 3,
        'actividad_id' => 2,
    ],


];
}

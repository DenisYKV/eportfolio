<?php

namespace Database\Seeders;

use App\Models\FamiliaProfesional;
use App\Models\Tarea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarea::truncate();
        foreach (self::$tareas as $tarea) {
            Tarea::create([
                'criterio_evaluacion_id' => $tarea['criterio_evaluacion_id'],
                'fecha_apertura' => $tarea['fecha_apertura'],
                'fecha_cierre' => $tarea['fecha_cierre'],
                'activo' => $tarea['activo'],
                'enunciado' => $tarea['enunciado'],
            ]);
        }
        $this->command->info('¡Tabla tareas inicializada con datos!');
    }

    private static array $tareas = [
        [
            'criterio_evaluacion_id' => 1,
            'fecha_apertura' => '2023-01-01',
            'fecha_cierre' => '2023-01-31',
            'activo' => true,
            'enunciado' => 'Tarea 1',
        ],
        [
            'criterio_evaluacion_id' => 2,
            'fecha_apertura' => '2023-02-01',
            'fecha_cierre' => '2023-02-28',
            'activo' => true,
            'enunciado' => 'Tarea 2',
        ],
        [
            'criterio_evaluacion_id' => 3,
            'fecha_apertura' => '2023-03-01',
            'fecha_cierre' => '2023-03-31',
            'activo' => true,
            'enunciado' => 'Tarea 3',
        ],
    ];

}

<?php

namespace Database\Seeders;

use App\Models\Evaluacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluacion::truncate();

        foreach (self::$evaluaciones as $evaluacion) {
            DB::table('evaluaciones')->insert([
                'evidencia_id' => $evaluacion['evidencia_id'],
                'user_id' => $evaluacion['user_id'],
                'puntuacion' => $evaluacion['puntuacion'],
                'estado' => $evaluacion['estado'],
                'observaciones' => $evaluacion['observaciones']
            ]);
        }
        $this->command->info('¡Tabla evaluaciones inicializada con datos!');
    }

    public static $evaluaciones = [
        ['evidencia_id' => 1, 'user_id' => 1, 'puntuacion' => 50.5, 'estado' => 'pendiente', 'observaciones' => ''],
        ['evidencia_id' => 2, 'user_id' => 2, 'puntuacion' => 70, 'estado' => 'pendiente', 'observaciones' => '']
    ];
}

<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matricula::truncate();

        foreach (self::$matriculas as $matricula) {
            DB::table('matriculas')->insert([
                'estudiante_id' => $matricula['estudiante_id'],
                'modulo_formativo_id' => $matricula['modulo_formativo_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Mensaje de confirmación en consola
        $this->command->info('¡Tabla matriculas inicializada con datos!');
    }

    // Datos de ejemplo para insertar
    public static $matriculas = [
        ['estudiante_id' => 1, 'modulo_formativo_id' => 2],
        ['estudiante_id' => 2, 'modulo_formativo_id' => 1],
        ['estudiante_id' => 3, 'modulo_formativo_id' => 3],
        ['estudiante_id' => 4, 'modulo_formativo_id' => 4],
        ['estudiante_id' => 5, 'modulo_formativo_id' => 5],
    ];
}

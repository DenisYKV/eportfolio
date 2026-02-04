<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comentario::truncate();

        foreach (self::$comentarios as $comentario) {
            DB::table('comentarios')->insert([
                'evidencia_id' => $comentario['evidencia_id'],
                'user_id' => $comentario['user_id'],
                'contenido' => $comentario['contenido'],
                'tipo' => $comentario['tipo']
            ]);
        }
        $this->command->info('¡Tabla comentarios inicializada con datos!');
    }

    public static $comentarios = [
        ['evidencia_id' => 1, 'user_id' => 1, 'contenido' => 'Contenido de comentario 1', 'tipo' => 'feedback'],
        ['evidencia_id' => 2, 'user_id' => 2, 'contenido' => 'Contenido de comentario 2', 'tipo' => 'feedback']
    ];
}

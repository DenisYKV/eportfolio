<?php

namespace Database\Seeders;

use App\Models\AsignacionRevision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsignacionesRevisionTableSeeder extends Seeder

{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
{
        AsignacionRevision::truncate();

foreach (self::$asignacionesRevision as $asignacionRevision) {
            $c = new AsignacionRevision();

            $c->evidencia_id = $asignacionRevision['evidencia_id'];
            $c->revisor_id = $asignacionRevision['revisor_id'];
            $c->asignado_por_id = $asignacionRevision['asignado_por_id'];
            $c->fecha_limite = $asignacionRevision['fecha_limite'];
            $c->estado = $asignacionRevision['estado'];

            $c->save();
        }
    }

    private static $asignacionesRevision = [
    [
        'evidencia_id'     => 1,
        'revisor_id'       => 2,
        'asignado_por_id'  => 1,
        'fecha_limite'     => '2026-02-01',
        'estado'           => 'pendiente',

    ],
    [
        'evidencia_id'     => 2,
        'revisor_id'       => 3,
        'asignado_por_id'  => 1,
        'fecha_limite'     => '2026-02-05',
        'estado'           => 'pendiente',

    ],
    [
        'evidencia_id'     => 3,
        'revisor_id'       => 2,
        'asignado_por_id'  => 4,
        'fecha_limite'     => '2026-02-10',
        'estado'           => 'validada',

    ],
    [
        'evidencia_id'     => 4,
        'revisor_id'       => 3,
        'asignado_por_id'  => 4,
        'fecha_limite'     => '2026-02-15',
        'estado'           => 'rechazada',

    ],
];



}

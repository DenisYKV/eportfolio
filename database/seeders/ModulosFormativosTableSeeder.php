<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModuloFormativo;
use App\Models\CicloFormativo;

class ModulosFormativosTableSeeder extends Seeder
{
    public function run(): void
    {
        ModuloFormativo::truncate();

        // Mapa codigo_ciclo => id
        $ciclos = CicloFormativo::pluck('id', 'codigo');

        foreach (self::$modulos as $modulo) {

            // Convertimos el codigo del ciclo a id
            if (!isset($ciclos[$modulo['codCiclo']])) {
                continue;
            }

            ModuloFormativo::create([
                'ciclo_formativo_id' => $ciclos[$modulo['codCiclo']],
                'nombre' => $modulo['nombre'],
                'codigo' => $modulo['codigo'],
                'horas_totales' => $modulo['horas'],
            ]);
        }

        $this->command->info('Tabla modulos_formativos inicializada con datos');
    }

    /**
     * ARRAY SIMPLE DE MODULOS (SIN DUPLICADOS)
     */
    public static $modulos = [
        // ADFI3 - Administración y Finanzas
        ['codCiclo'=>'ADFI3','codigo'=>'MOD-ADF-01','nombre'=>'Gestión de la documentación jurídica y empresarial','horas'=>96],
        ['codCiclo'=>'ADFI3','codigo'=>'MOD-ADF-02','nombre'=>'Recursos humanos y responsabilidad social corporativa','horas'=>96],
        ['codCiclo'=>'ADFI3','codigo'=>'MOD-ADF-03','nombre'=>'Gestión financiera','horas'=>128],

        // ASIR3 - Sistemas Informáticos en Red
        ['codCiclo'=>'ASIR3','codigo'=>'MOD-ASIR-01','nombre'=>'Implantación de sistemas operativos','horas'=>192],
        ['codCiclo'=>'ASIR3','codigo'=>'MOD-ASIR-02','nombre'=>'Planificación y administración de redes','horas'=>192],
        ['codCiclo'=>'ASIR3','codigo'=>'MOD-ASIR-03','nombre'=>'Servicios de red e Internet','horas'=>128],

        // DAPW3 - Desarrollo de Aplicaciones Web
        ['codCiclo'=>'DAPW3','codigo'=>'MOD-DAPW-01','nombre'=>'Desarrollo web en entorno cliente','horas'=>192],
        ['codCiclo'=>'DAPW3','codigo'=>'MOD-DAPW-02','nombre'=>'Desarrollo web en entorno servidor','horas'=>192],
        ['codCiclo'=>'DAPW3','codigo'=>'MOD-DAPW-03','nombre'=>'Despliegue de aplicaciones web','horas'=>96],

        // EMAS2 - Emergencias Sanitarias
        ['codCiclo'=>'EMSA2','codigo'=>'MOD-EMSA-01','nombre'=>'Mantenimiento mecánico preventivo del vehículo','horas'=>96],
        ['codCiclo'=>'EMSA2','codigo'=>'MOD-EMSA-02','nombre'=>'Atención sanitaria inicial en situaciones de emergencia','horas'=>192],

        // EDIN3 - Educación Infantil
        ['codCiclo'=>'EDIN3','codigo'=>'MOD-EDIN-01','nombre'=>'Didáctica de la educación infantil','horas'=>192],
        ['codCiclo'=>'EDIN3','codigo'=>'MOD-EDIN-02','nombre'=>'Autonomía personal y salud infantil','horas'=>128],
    ];
}


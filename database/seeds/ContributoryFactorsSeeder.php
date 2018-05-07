<?php

use App\ContributoryFactors;
use Illuminate\Database\Seeder;

class ContributoryFactorsSeeder extends Seeder
{

    public function run()
    {
        ContributoryFactors::create([
            'origin_id' => '1',
            'contributory_factor' => 'Lenguaje y comunicación.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '1',
            'contributory_factor' => 'Personalidad y factores sociales.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '1',
            'contributory_factor' => 'Factores culturales',
        ]);
        ContributoryFactors::create([
            'origin_id' => '2',
            'contributory_factor' => 'Diseño de la tarea y claridad de la estructura.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '2',
            'contributory_factor' => 'Disponibilidad y uso de protocolos.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '2',
            'contributory_factor' => 'Disponibilidad y confiabilidad de las pruebas diagnósticas.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '2',
            'contributory_factor' => 'Equipamiento',
        ]);
        ContributoryFactors::create([
            'origin_id' => '3',
            'contributory_factor' => 'Conocimientos, habilidades y competencias.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '3',
            'contributory_factor' => 'Salud física y mental.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '3',
            'contributory_factor' => 'Valores éticos.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '3',
            'contributory_factor' => 'Resistencia al cambio.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '3',
            'contributory_factor' => 'Espíritu colaborativo o entorpecedor.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '4',
            'contributory_factor' => 'Clima laboral (presencia o ausencia de conflictos en relaciones interpersonales)',
        ]);
        ContributoryFactors::create([
            'origin_id' => '4',
            'contributory_factor' => 'Comunicación verbal, corporal y escrita.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '4',
            'contributory_factor' => 'Supervisión y disponibilidad de soporte.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '4',
            'contributory_factor' => 'Estructura de equipo (consistencia, congruencia, etc).',
        ]);
        ContributoryFactors::create([
            'origin_id' => '4',
            'contributory_factor' => 'Presencia o ausencia de cultura de calidad y seguridad del paciente.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Personal suficiente.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Mezcla de habilidades.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Carga de trabajo.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Patrón de turnos.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Diseño, disponibilidad y mantenimiento de equipos.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Soporte administrativo y gerencial.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '5',
            'contributory_factor' => 'Ambiente físico (luz, espacio, ruido).',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Existencia de protocolos',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Programas de supervisión implementados.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Perfil de competencias para ocupar el cargo.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Programas de orientación en el puesto de trabajo.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Recursos y limitaciones financieras.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Estructura organizacional.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Políticas, estándares y metas.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '6',
            'contributory_factor' => 'Prioridades y cultura organizacional.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '7',
            'contributory_factor' => 'Económico y regulatorio.',
        ]);
        ContributoryFactors::create([
            'origin_id' => '7',
            'contributory_factor' => 'Contactos externos.',
        ]);
    }
}

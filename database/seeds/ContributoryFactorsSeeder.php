<?php

use App\ContributoryFactor;
use Illuminate\Database\Seeder;

class ContributoryFactorsSeeder extends Seeder
{

    public function run()
    {
        ContributoryFactor::create([
            'origin_id' => '1',
            'contributory_factor' => 'Lenguaje y comunicación.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '1',
            'contributory_factor' => 'Personalidad y factores sociales.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '1',
            'contributory_factor' => 'Factores culturales',
        ]);
        ContributoryFactor::create([
            'origin_id' => '2',
            'contributory_factor' => 'Diseño de la tarea y claridad de la estructura.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '2',
            'contributory_factor' => 'Disponibilidad y uso de protocolos.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '2',
            'contributory_factor' => 'Disponibilidad y confiabilidad de las pruebas diagnósticas.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '2',
            'contributory_factor' => 'Equipamiento',
        ]);
        ContributoryFactor::create([
            'origin_id' => '3',
            'contributory_factor' => 'Conocimientos, habilidades y competencias.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '3',
            'contributory_factor' => 'Salud física y mental.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '3',
            'contributory_factor' => 'Valores éticos.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '3',
            'contributory_factor' => 'Resistencia al cambio.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '3',
            'contributory_factor' => 'Espíritu colaborativo o entorpecedor.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '4',
            'contributory_factor' => 'Clima laboral (presencia o ausencia de conflictos en relaciones interpersonales)',
        ]);
        ContributoryFactor::create([
            'origin_id' => '4',
            'contributory_factor' => 'Comunicación verbal, corporal y escrita.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '4',
            'contributory_factor' => 'Supervisión y disponibilidad de soporte.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '4',
            'contributory_factor' => 'Estructura de equipo (consistencia, congruencia, etc).',
        ]);
        ContributoryFactor::create([
            'origin_id' => '4',
            'contributory_factor' => 'Presencia o ausencia de cultura de calidad y seguridad del paciente.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Personal suficiente.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Mezcla de habilidades.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Carga de trabajo.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Patrón de turnos.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Diseño, disponibilidad y mantenimiento de equipos.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Soporte administrativo y gerencial.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '5',
            'contributory_factor' => 'Ambiente físico (luz, espacio, ruido).',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Existencia de protocolos',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Programas de supervisión implementados.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Perfil de competencias para ocupar el cargo.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Programas de orientación en el puesto de trabajo.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Recursos y limitaciones financieras.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Estructura organizacional.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Políticas, estándares y metas.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '6',
            'contributory_factor' => 'Prioridades y cultura organizacional.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '7',
            'contributory_factor' => 'Económico y regulatorio.',
        ]);
        ContributoryFactor::create([
            'origin_id' => '7',
            'contributory_factor' => 'Contactos externos.',
        ]);
    }
}

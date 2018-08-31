<?php

use App\Origin;
use Illuminate\Database\Seeder;

class OriginsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Origin::create([
            'origin' => 'Paciente',
        ]);
        Origin::create([
            'origin' => 'Tarea y Tecnología',
        ]);
        Origin::create([
            'origin' => 'Individuo (funcionario)',
        ]);
        Origin::create([
            'origin' => 'Equipo de Trabajo',
        ]);
        Origin::create([
            'origin' => 'Ambiente',
        ]);
        Origin::create([
            'origin' => 'Organización y Gerencia',
        ]);
        Origin::create([
            'origin' => 'Contexto Institucional',
        ]);

    }
}

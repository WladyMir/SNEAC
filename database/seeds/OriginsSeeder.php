<?php

use App\Origins;
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
        Origins::create([
            'origin' => 'Paciente',
        ]);
        Origins::create([
            'origin' => 'Tarea y Tecnología',
        ]);
        Origins::create([
            'origin' => 'Individuo (funcionario)',
        ]);
        Origins::create([
            'origin' => 'Equipo de Trabajo',
        ]);
        Origins::create([
            'origin' => 'Ambiente',
        ]);
        Origins::create([
            'origin' => 'Organización y Gerencia',
        ]);
        Origins::create([
            'origin' => 'Contexto Institucional',
        ]);

    }
}

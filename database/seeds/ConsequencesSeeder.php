<?php

use App\Consequence;
use Illuminate\Database\Seeder;

class ConsequencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consequence::create([
            'consequence' => 'Incidente que no llego al paciente',
        ]);
        Consequence::create([
            'consequence' => 'Incidente que llegó al paciente, pero no causo daño',
        ]);
        Consequence::create([
            'consequence' => 'Situación con capacidad de causar incidente',
        ]);
        Consequence::create([
            'consequence' => 'Llegó al paciente y no causo daño',
        ]);
        Consequence::create([
            'consequence' => 'Causó daño temporal al paciente y prolongó la hospitalización',
        ]);
        Consequence::create([
            'consequence' => 'Causa con daño permanente al paciente',
        ]);
        Consequence::create([
            'consequence' => 'Comprometió la vida del paciente y se intervino para mantener',
        ]);
        Consequence::create([
            'consequence' => 'Causó la muerte del paciente',
        ]);

    }
}

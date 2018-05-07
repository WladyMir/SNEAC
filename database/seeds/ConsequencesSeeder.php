<?php

use App\Consequences;
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
        Consequences::create([
            'consequence' => 'Incidente que no llego al paciente',
        ]);
        Consequences::create([
            'consequence' => 'Incidente que llegó al paciente, pero no causo daño',
        ]);
        Consequences::create([
            'consequence' => 'Situación con capacidad de causar incidente',
        ]);
        Consequences::create([
            'consequence' => 'Llegó al paciente y no causo daño',
        ]);
        Consequences::create([
            'consequence' => 'Causó daño temporal al paciente y prolongó la hospitalización',
        ]);
        Consequences::create([
            'consequence' => 'Causa con daño permanente al paciente',
        ]);
        Consequences::create([
            'consequence' => 'Comprometió la vida del paciente y se intervino para mantener',
        ]);
        Consequences::create([
            'consequence' => 'Causó la muerte del paciente',
        ]);

    }
}

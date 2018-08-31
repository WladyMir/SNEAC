<?php

use App\Classification;
use Illuminate\Database\Seeder;

class ClassifcationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classification::create([
            'name_classification' => 'Ámbito: Seguridad de la cirugía',
        ]);
        Classification::create([
            'name_classification' => 'Ámbito: Atención obstétrica',
        ]);
        Classification::create([
            'name_classification' => 'Ámbito: Infecciones asociadas a la atención en salud',
        ]);
        Classification::create([
            'name_classification' => 'Ámbito: seguridad la medicina transfusional',
        ]);
        Classification::create([
            'name_classification' => 'Ámbito: Atención y cuidados de los pacientes',
        ]);
        Classification::create([
            'name_classification' => 'Otros',
        ]);


    }
}

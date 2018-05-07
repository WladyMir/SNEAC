<?php

use App\Classifications;
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
        Classifications::create([
            'name_classification' => 'Ámbito: Seguridad de la cirugía',
        ]);
        Classifications::create([
            'name_classification' => 'Ámbito: Atención obstétrica',
        ]);
        Classifications::create([
            'name_classification' => 'Ámbito: Infecciones asociadas a la atención en salud',
        ]);
        Classifications::create([
            'name_classification' => 'Ámbito: seguridad la medicina transfusional',
        ]);
        Classifications::create([
            'name_classification' => 'Ámbito: Atención y cuidados de los pacientes',
        ]);
        Classifications::create([
            'name_classification' => 'Otros',
        ]);


    }
}

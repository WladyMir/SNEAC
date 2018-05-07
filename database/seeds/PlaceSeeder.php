<?php

use App\Places;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Places::create([
            'place' => 'Cirugía',
        ]);
        Places::create([
            'place' => 'Medicina    ',
        ]);
        Places::create([
            'place' => 'Médico - Quirúrgico',
        ]);
        Places::create([
            'place' => 'Geriatría',
        ]);
        Places::create([
            'place' => 'Pediatría',
        ]);
        Places::create([
            'place' => 'Pabellón',
        ]);
        Places::create([
            'place' => 'UPC ADL',
        ]);
        Places::create([
            'place' => 'UPC PED',
        ]);
        Places::create([
            'place' => 'UPC NEO',
        ]);
        Places::create([
            'place' => 'URG ADL',
        ]);
        Places::create([
            'place' => 'URG PED',
        ]);
        Places::create([
            'place' => 'URG G-O',
        ]);
        Places::create([
            'place' => 'Gine-Obst',
        ]);
        Places::create([
            'place' => 'SAIP',
        ]);
        Places::create([
            'place' => 'CAE',
        ]);
        Places::create([
            'place' => 'Dental',
        ]);
        Places::create([
            'place' => 'Med Física y Rehabilitación',
        ]);
        Places::create([
            'place' => 'Movilización',
        ]);
        Places::create([
            'place' => 'UMT- Donantes',
        ]);
        Places::create([
            'place' => 'Anat. Patológica',
        ]);
        Places::create([
            'place' => 'Farmacia',
        ]);
        Places::create([
            'place' => 'Esterilización',
        ]);
        Places::create([
            'place' => 'Nutrición',
        ]);
        Places::create([
            'place' => 'Laboratorio',
        ]);
        Places::create([
            'place' => 'Imagenología',
        ]);
        Places::create([
            'place' => 'Domicilio',
        ]);




    }
}

<?php

use App\Place;
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
        Place::create([
            'place' => 'Cirugía',
        ]);
        Place::create([
            'place' => 'Medicina    ',
        ]);
        Place::create([
            'place' => 'Médico - Quirúrgico',
        ]);
        Place::create([
            'place' => 'Geriatría',
        ]);
        Place::create([
            'place' => 'Pediatría',
        ]);
        Place::create([
            'place' => 'Pabellón',
        ]);
        Place::create([
            'place' => 'UPC ADL',
        ]);
        Place::create([
            'place' => 'UPC PED',
        ]);
        Place::create([
            'place' => 'UPC NEO',
        ]);
        Place::create([
            'place' => 'URG ADL',
        ]);
        Place::create([
            'place' => 'URG PED',
        ]);
        Place::create([
            'place' => 'URG G-O',
        ]);
        Place::create([
            'place' => 'Gine-Obst',
        ]);
        Place::create([
            'place' => 'SAIP',
        ]);
        Place::create([
            'place' => 'CAE',
        ]);
        Place::create([
            'place' => 'Dental',
        ]);
        Place::create([
            'place' => 'Med Física y Rehabilitación',
        ]);
        Place::create([
            'place' => 'Movilización',
        ]);
        Place::create([
            'place' => 'UMT- Donantes',
        ]);
        Place::create([
            'place' => 'Anat. Patológica',
        ]);
        Place::create([
            'place' => 'Farmacia',
        ]);
        Place::create([
            'place' => 'Esterilización',
        ]);
        Place::create([
            'place' => 'Nutrición',
        ]);
        Place::create([
            'place' => 'Laboratorio',
        ]);
        Place::create([
            'place' => 'Imagenología',
        ]);
        Place::create([
            'place' => 'Domicilio',
        ]);




    }
}

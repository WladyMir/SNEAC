<?php

use App\Details;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Details::create([
            'event_name_id' => '22',
            'detail' => 'Sin daño',
        ]);
        Details::create([
            'event_name_id' => '22',
            'detail' => 'Con daño',
        ]);
        Details::create([
            'event_name_id' => '23',
            'detail' => 'G 1',
        ]);
        Details::create([
            'event_name_id' => '23',
            'detail' => 'G 2',
        ]);
        Details::create([
            'event_name_id' => '23',
            'detail' => 'G 3',
        ]);
        Details::create([
            'event_name_id' => '23',
            'detail' => 'G 4',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de prescripción',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de transcripción',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de dispensación',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de almacenamiento',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de preparación',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Error de administración',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'RAM por error de medicamentos',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Extravasación de medicamentos',
        ]);
        Details::create([
            'event_name_id' => '24',
            'detail' => 'Extravasación de medio de contraste',
        ]);
        Details::create([
            'event_name_id' => '25',
            'detail' => 'Extubación accidental',
        ]);
        Details::create([
            'event_name_id' => '25',
            'detail' => 'Desplazamiento de drenajes',
        ]);
        Details::create([
            'event_name_id' => '25',
            'detail' => 'Desplazamiento CVC',
        ]);
        Details::create([
            'event_name_id' => '26',
            'detail' => 'Lesiones asociadas a contención física',
        ]);
        Details::create([
            'event_name_id' => '26',
            'detail' => 'Lesiones asociadas a rehabilitación kinésica',
        ]);
        Details::create([
            'event_name_id' => '26',
            'detail' => 'Quemaduras',
        ]);
        Details::create([
            'event_name_id' => '26',
            'detail' => 'Flebitis',
        ]);
        Details::create([
            'event_name_id' => '28',
            'detail' => 'No notificación de resultado crítico',
        ]);
        Details::create([
            'event_name_id' => '28',
            'detail' => 'Extravío de muestras',
        ]);
        Details::create([
            'event_name_id' => '28',
            'detail' => 'Informe erróneo de exámenes (error de resultado, identificación del paciente)',
        ]);
        Details::create([
            'event_name_id' => '28',
            'detail' => 'Extravío de biopsias',
        ]);
    }
}

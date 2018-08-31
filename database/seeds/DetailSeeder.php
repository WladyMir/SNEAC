<?php

use App\Detail;
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
        Detail::create([
            'event_name_id' => '22',
            'detail' => 'Sin daño',
        ]);
        Detail::create([
            'event_name_id' => '22',
            'detail' => 'Con daño',
        ]);
        Detail::create([
            'event_name_id' => '23',
            'detail' => 'G 1',
        ]);
        Detail::create([
            'event_name_id' => '23',
            'detail' => 'G 2',
        ]);
        Detail::create([
            'event_name_id' => '23',
            'detail' => 'G 3',
        ]);
        Detail::create([
            'event_name_id' => '23',
            'detail' => 'G 4',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de prescripción',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de transcripción',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de dispensación',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de almacenamiento',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de preparación',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Error de administración',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'RAM por error de medicamentos',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Extravasación de medicamentos',
        ]);
        Detail::create([
            'event_name_id' => '24',
            'detail' => 'Extravasación de medio de contraste',
        ]);
        Detail::create([
            'event_name_id' => '25',
            'detail' => 'Extubación accidental',
        ]);
        Detail::create([
            'event_name_id' => '25',
            'detail' => 'Desplazamiento de drenajes',
        ]);
        Detail::create([
            'event_name_id' => '25',
            'detail' => 'Desplazamiento CVC',
        ]);
        Detail::create([
            'event_name_id' => '26',
            'detail' => 'Lesiones asociadas a contención física',
        ]);
        Detail::create([
            'event_name_id' => '26',
            'detail' => 'Lesiones asociadas a rehabilitación kinésica',
        ]);
        Detail::create([
            'event_name_id' => '26',
            'detail' => 'Quemaduras',
        ]);
        Detail::create([
            'event_name_id' => '26',
            'detail' => 'Flebitis',
        ]);
        Detail::create([
            'event_name_id' => '28',
            'detail' => 'No notificación de resultado crítico',
        ]);
        Detail::create([
            'event_name_id' => '28',
            'detail' => 'Extravío de muestras',
        ]);
        Detail::create([
            'event_name_id' => '28',
            'detail' => 'Informe erróneo de exámenes (error de resultado, identificación del paciente)',
        ]);
        Detail::create([
            'event_name_id' => '28',
            'detail' => 'Extravío de biopsias',
        ]);
    }
}

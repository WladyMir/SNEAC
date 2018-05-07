<?php

use App\EventsNames;
use Illuminate\Database\Seeder;

class EventNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Enfermedad Tromboembólica (ETE) en pacientes quirúrgicos. Trombosis venosa profunda o Tromboembolismo pulmonar',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Cirugía de paciente equivocado',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Cirugía de sitio equivocado',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Cuerpo extraño olvidado',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Paro cardíaco intra-operatorio',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Extirpación no programada de un órgano',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Re operaciones no programadas',
        ]);
        EventsNames::create([
            'classifications_id' => '1',
            'name' => 'Suspensión de cirugía post inducción anestésica',
        ]);
        EventsNames::create([
            'classifications_id' => '2',
            'name' => 'Muerte materna',
        ]);
        EventsNames::create([
            'classifications_id' => '2',
            'name' => 'Muerte fetal tardía',
        ]);
        EventsNames::create([
            'classifications_id' => '2',
            'name' => 'Asfixia neonatal',
        ]);
        EventsNames::create([
            'classifications_id' => '3',
            'name' => 'Prolongación o reaparición de brote epidémico',
        ]);
        EventsNames::create([
            'classifications_id' => '3',
            'name' => 'Distribución de material no estéril a los servicios clínicos',
        ]);
        EventsNames::create([
            'classifications_id' => '3',
            'name' => 'Infección del tercer molar',
        ]);
        EventsNames::create([
            'classifications_id' => '3',
            'name' => 'Material estéril con presencia de materia orgánica',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Transfusión del paciente equivocado',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Transfusión de componentes sanguíneos sin tamizajes microbiológicos conforme',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Infecciones por un agente transmisible que se puede transmitir por transfusiones',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Reacción hemolítica aguda por cumplimiento de indicación de transfusión de hemoderivados incompatibilidad de grupo sanguíneo',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Reacción por sobrecarga de volumen',
        ]);
        EventsNames::create([
            'classifications_id' => '4',
            'name' => 'Multipunción innecesaria en banco de donantes',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Caída de pacientes',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Ulceras por presión',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Error de medicación',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Desplazamiento de dispositivos invasivos',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Lesiones en la piel',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Fuga',
        ]);
        EventsNames::create([
            'classifications_id' => '5',
            'name' => 'Exámenes',
        ]);
        EventsNames::create([
            'classifications_id' => '6',
            'name' => 'ITU asociada a Sonda Folley',
        ]);
        EventsNames::create([
            'classifications_id' => '6',
            'name' => 'Endometritis Puerperal',
        ]);
        EventsNames::create([
            'classifications_id' => '6',
            'name' => 'Neumonía asociada a VM',
        ]);
        EventsNames::create([
            'classifications_id' => '6',
            'name' => 'Otros',
        ]);


    }
}

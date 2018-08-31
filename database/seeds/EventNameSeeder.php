<?php

use App\EventsName;
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
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Enfermedad Tromboembólica (ETE) en pacientes quirúrgicos. Trombosis venosa profunda o Tromboembolismo pulmonar',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Cirugía de paciente equivocado',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Cirugía de sitio equivocado',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Cuerpo extraño olvidado',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Paro cardíaco intra-operatorio',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Extirpación no programada de un órgano',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Re operaciones no programadas',
        ]);
        EventsName::create([
            'classifications_id' => '1',
            'name' => 'Suspensión de cirugía post inducción anestésica',
        ]);
        EventsName::create([
            'classifications_id' => '2',
            'name' => 'Muerte materna',
        ]);
        EventsName::create([
            'classifications_id' => '2',
            'name' => 'Muerte fetal tardía',
        ]);
        EventsName::create([
            'classifications_id' => '2',
            'name' => 'Asfixia neonatal',
        ]);
        EventsName::create([
            'classifications_id' => '3',
            'name' => 'Prolongación o reaparición de brote epidémico',
        ]);
        EventsName::create([
            'classifications_id' => '3',
            'name' => 'Distribución de material no estéril a los servicios clínicos',
        ]);
        EventsName::create([
            'classifications_id' => '3',
            'name' => 'Infección del tercer molar',
        ]);
        EventsName::create([
            'classifications_id' => '3',
            'name' => 'Material estéril con presencia de materia orgánica',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Transfusión del paciente equivocado',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Transfusión de componentes sanguíneos sin tamizajes microbiológicos conforme',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Infecciones por un agente transmisible que se puede transmitir por transfusiones',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Reacción hemolítica aguda por cumplimiento de indicación de transfusión de hemoderivados incompatibilidad de grupo sanguíneo',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Reacción por sobrecarga de volumen',
        ]);
        EventsName::create([
            'classifications_id' => '4',
            'name' => 'Multipunción innecesaria en banco de donantes',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Caída de pacientes',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Ulceras por presión',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Error de medicación',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Desplazamiento de dispositivos invasivos',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Lesiones en la piel',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Fuga',
        ]);
        EventsName::create([
            'classifications_id' => '5',
            'name' => 'Exámenes',
        ]);
        EventsName::create([
            'classifications_id' => '6',
            'name' => 'ITU asociada a Sonda Folley',
        ]);
        EventsName::create([
            'classifications_id' => '6',
            'name' => 'Endometritis Puerperal',
        ]);
        EventsName::create([
            'classifications_id' => '6',
            'name' => 'Neumonía asociada a VM',
        ]);
        EventsName::create([
            'classifications_id' => '6',
            'name' => 'Otros',
        ]);


    }
}

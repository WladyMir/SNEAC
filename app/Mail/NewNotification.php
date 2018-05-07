<?php

namespace App\Mail;


use App\Classifications;
use App\Consequences;
use App\EventDatas;
use App\EventsNames;
use App\PatientDatas;
use App\Places;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Places
     */
    public $placeEvent;
    /**
     * @var PatientDatas
     */
    public $patient_datas;
    /**
     * @var Consequences
     */
    public $consequence;
    /**
     * @var Classifications
     */
    public $classification;
    /**
     * @var EventsNames
     */
    public $event_name;
    /**
     * @var EventDatas
     */
    public $event_datas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Places $placeEvent,
                                PatientDatas $patient_datas,
                                Consequences $consequence,
                                Classifications $classification,
                                EventsNames $event_name,
                                EventDatas $event_datas)
    {

        $this->placeEvent = $placeEvent;
        $this->patient_datas = $patient_datas;
        $this->consequence = $consequence;
        $this->classification = $classification;
        $this->event_name = $event_name;
        $this->event_datas = $event_datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.newNotification')
            ->subject('Nueva notificacion');
    }
}

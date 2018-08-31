<?php

namespace App\Mail;


use App\Classification;
use App\Consequence;
use App\EventData;
use App\EventsName;
use App\PatientData;
use App\Place;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Place
     */
    public $placeEvent;
    /**
     * @var PatientData
     */
    public $patient_datas;
    /**
     * @var Consequence
     */
    public $consequence;
    /**
     * @var Classification
     */
    public $classification;
    /**
     * @var EventsName
     */
    public $event_name;
    /**
     * @var EventData
     */
    public $event_datas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Place $placeEvent,
                                PatientData $patient_datas,
                                Consequence $consequence,
                                Classification $classification,
                                EventsName $event_name,
                                EventData $event_datas)
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

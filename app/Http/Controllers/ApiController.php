<?php

namespace App\Http\Controllers;

use App\ActivitiesImprovementPlan;
use App\ActivityResponsable;
use App\ContributoryFactorByReport;
use App\MonitoringResponsable;
use App\Notification;
use App\Participant;
use App\Place;
use App\ReportDate;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getParticipantsForReport($id){

        return Participant::findByIdReport($id);
    }

    public function getDatesForReport($id){

        return ReportDate::findByIdReport($id);
    }
    public function getContributoryFactorsForReport($id){

        return ContributoryFactorByReport::findByIdReport($id);
    }
    public function getActivitiesForImprovementPlan($id){

        return ActivitiesImprovementPlan::findByIdImprovementPlan($id);
    }
    public function getNotificationsForPlace($id){

        $not=Notification::findByIdPlace($id);

        foreach ($not as $n){
            $n->place;
            $n->eventName;
        }

        return $not;
    }
    public function getNotificationsForEventType($event_type){
        $not=Notification::findByEventType($event_type);

        foreach ($not as $n){
            $n->place;
            $n->eventName;
        }

        return $not;
    }
    public function getNotificationsForStatus($event_status){
        $not=Notification::findByStatus($event_status);

        foreach ($not as $n){
            $n->place;
            $n->eventName;
        }

        return $not;
    }

    public function getPlaces(){
        return Place::all('id','place');
    }
    public function getResponsableForActivity($id){
        return ActivityResponsable::findByIdActivity($id);
    }
    public function getResponsableMonitoringForActivity($id){
        return MonitoringResponsable::findByIdActivity($id);
    }
}

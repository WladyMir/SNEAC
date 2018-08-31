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

        return Notification::findByIdPlace($id);
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

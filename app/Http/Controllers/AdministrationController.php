<?php

namespace App\Http\Controllers;

use App\ImprovementPlan;
use App\Notification;
use App\Place;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministrationController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function administration()
    {
        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $users=User::all();
        $places=Place::all();

        return view('gestion.administration.administration',
            compact('users',
                'quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'quantityReports',
                'count',
                'users',
                'places'
            )
        );

    }

    public function userDestroy(User $user){
        $user->delete();
        return redirect()->route('gestion.administration');
    }
    public function userEdit(User $user){
        $places=Place::all();
        return view('gestion.administration.editUser',compact('places','user'));
    }

    public function updateUser(User $user){

        $data=request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'rut' => 'required|string|max:13|cl_rut',
            'place_id' => 'required',
            'is_admin' =>'required',
            'labor' => 'required'
        ]);

        if($data['is_admin']==="si"){
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rut'=> $data['rut'],
                'is_admin' => true,
                'is_quality_attendant' => false,
                'place_id' =>$data['place_id'],
                'labor' => $data['labor'],

            ]);
        }
        else{
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rut'=> $data['rut'],
                'place_id' =>$data['place_id'],
                'is_admin' => false,
                'is_quality_attendant' => true,
                'labor' => $data['labor'],
            ]);
        }

        return redirect()->route('gestion.administration');




    }
}

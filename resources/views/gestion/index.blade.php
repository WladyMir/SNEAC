@extends('layout')

@section('title','Administracion')

@section('menu')
    @include('includes.menu',['c'=>$count,
   'quantityReports'=>$quantityReports,
   'quantityAllReports'=>$quantityAllReports,
   'quantityImpPlans'=>$quantityImpPlans,
   'quantityAllImpPlans'=>$quantityAllImpPlans,
   ])
@endsection

@section('title card','Sistema de Notificación de Incidente Eventos Adversos y Centinelas.')

@section('content')
    <p>Bienvenido al Sistema de gestion de inicidentes, eventos adversos y centinelas del Hospital el Carmen de Maipú</p>


@endsection


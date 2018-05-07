@extends('layout')

@section('title','Sistema de notificación de incidentes, eventos adversos y centinelas.')

@section('title card','Sistema de notificación de incidentes, eventos adversos y centinelas.')
@section('content')
<h5 class="card-title">Notificaciones</h5>
<p class="card-text">Seleccione el siguiente enlace para una nueva notificación.</p>
<a href="{{ route('notifications.patient') }}" class="btn btn-primary">Nueva Notificación</a>


@endsection



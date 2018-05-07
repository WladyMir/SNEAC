@extends('layout')

@section('title','Clasificacion y Causas')

@section('title card','Clasificacion y Causas')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gestion.showNotification',$notification) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('gestion.clasification',$notification)}}">Clasificacion</a>
        </li>

    </ul>

@endsection
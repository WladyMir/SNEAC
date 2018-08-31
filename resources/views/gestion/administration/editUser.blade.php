@extends('layout')
@section('title','Editar Usuario')
@section('title card','Editar Usuario')
@section('content')
    <form method="POST" action="{{ url("gestion/administrarUsuarios/{$user->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="labor" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('labor') ? ' is-invalid' : '' }}" name="labor" placeholder="Ej: Dr, EU, etc." value="{{ old('labor', $user->labor) }}" required autofocus>

                @if ($errors->has('labor'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('labor') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

            <div class="col-md-6">
                <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut', $user->rut) }}" required autofocus>

                @if ($errors->has('rut'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('rut') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="place_id" class="col-md-4 col-form-label text-md-right">{{ __('Lugar o Servicio') }}</label>

            <div class="col-md-6">
                <select class="form-control{{ $errors->has('place_id') ? ' is-invalid' : '' }}" name="place_id">
                    <option value> Escoja el servicio</option>
                    @foreach($places as $place)
                        <option  value ="{{$place->id}}">{{$place->place}}</option>
                    @endforeach
                </select>
                @if ($errors->has('place_id'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('place_id') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}"  required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Constraseña') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('Administrador') }}</label>

            <div class="col-md-6">
                <label class="radio-inline">
                    <input type="radio" name="is_admin" id="si" value="si"> Sí
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_admin" id="no" value="no" checked> No
                </label>

            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Actualizar') }}
                </button>
            </div>
        </div>
    </form>

    <script src="/js/rut/formatRut.js"></script>
@endsection
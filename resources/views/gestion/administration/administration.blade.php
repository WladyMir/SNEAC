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

@section('title card','Administrar')

@section('content')
    <a class="btn btn-success" href="{{ route('register') }}">{{ __('Agregar Ususario') }}</a>
    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Rut</th>
                <th scope="col">Servicio o Unidad</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="table-default">
                    <td>{{$user->labor}} {{$user->name}}</td>
                    <td>{{$user->rut}}</td>
                    @if($user->place_id==null)
                        <td></td>
                    @else
                        @foreach($places as $place)
                            @if($user->place_id==$place->id)
                                <td>{{$place->place}}</td>
                            @endif
                        @endforeach
                    @endif


                    <td>{{$user->email}}</td>
                    @if($user->is_admin)
                        <td>Administrador</td>
                    @else
                        <td>Encargado de Calidad</td>
                    @endif
                    <td>
                        <form action="{{ route('gestion.userDestroy', $user) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{route('gestion.userEdit',$user)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                            <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                        </form>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>



@endsection


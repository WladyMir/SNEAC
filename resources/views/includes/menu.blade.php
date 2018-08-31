@if(auth()->check())
<div class="panel panel-primary">
    <div class="panel-heading">Menú</div>

    <div class="panel-body">
        <ul class="nav flex-column nav-pills">
            @if(auth()->user()->is_admin)
            <li @if(request()->is('gestion/notificaciones')) class="nav-link active" @endif class="nav-item">
                <a class="nav-link" href="{{ route('gestion.notifications') }}">Notificaciones</a>@if($c>0)
                <span class="badge badge-pill badge-danger">{{$c}}</span>
                @endif
            </li>
            @endif
            <li @if(request()->is('gestion/informes')) class="nav-link active" @endif class="nav-item">
                <a class="nav-link" href="{{ route('reports.reports') }}">Informes</a>@if($quantityReports>0)
                <span class="badge badge-pill badge-danger">{{$quantityReports}}</span>
                @endif
            </li>
            <li @if(request()->is('gestion/PlanesDeMejora')) class="nav-link active" @endif class="nav-item">
                <a class="nav-link" href="{{ route('improvementPlans.improvementPlans') }}">Planes de mejora</a>@if($quantityImpPlans>0)
                <span class="badge badge-pill badge-danger">{{$quantityImpPlans}}</span>@endif
            </li>
            @if(auth()->user()->is_admin)
            <li @if(request()->is('gestion/administrarUsuarios')) class="nav-link active"@endif class="nav-item">
                <a class="nav-link" href="{{ route('gestion.administration') }}">Administrar</a>
            </li>
            @endif

        </ul>
    </div>
</div>
@endif
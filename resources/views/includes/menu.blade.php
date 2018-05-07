@if(auth()->check())
<div class="panel panel-primary">
    <div class="panel-heading">Menú</div>

    <div class="panel-body">
        <ul class="nav flex-column nav-pills">
            <li @if(request()->is('gestion/notificaciones')) class="nav-link active" @endif class="nav-item">
                <a class="nav-link" href="{{ route('gestion.notifications') }}">Notificaciones</a>
            </li>
            <li @if(request()->is('gestion/PlanesDeMejora')) class="nav-link active" @endif class="nav-item">
                <a class="nav-link" href="{{ route('gestion.improvementPlans') }}">Planes de mejora</a>
            </li>
            <li @if(request()->is('gestion/administrarUsuarios')) class="nav-link active"@endif class="nav-item">
                <a class="nav-link" href="{{ route('gestion.manage') }}">Administrar</a>
            </li>

        </ul>

    </div>
</div>
@endif
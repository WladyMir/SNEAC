<style type="text/css">
    .tg  {width:1250px ;
        border: 1px solid black;
        border-collapse: collapse;
        margin: 10px auto;}
    .tg td{border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{background-color:#c0c0c0;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-xldj{border-color:inherit;text-align:center}
    .tg .tg-0pky{border-color:inherit;text-align:center;vertical-align:top}
    .table.table-center {
        width: 840px;
        margin: 0 auto;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<div>
    <table class="table table-center">
        <tbody>
        <tr style="height: 74px;">
            <td style="width: 208px; height: 74px;border: 1px solid #000000;"><img src="/home/wladimir/Proyectos/SNEAC_v1/resources/1.png" alt="logo hec" width="265" height="80" /></td>
            <td style="width: 472px; height: 74px;text-align: center;"><strong>INFORME DE ANÁLISIS INCIDENTE, EVENTO ADVERSO O CENTINELA DEPARTAMENTO DE CALIDAD Y SEGURIDAD DEL PACIENTE, E IAAS</strong></td>
        </tr>
        </tbody>
    </table>
</div>
<p></p>
<p></p>
<strong><u>PLAN DE MEJORA:</u></strong>
<p></p>
<div>
    <table class="tg">
        <tr>
            <th class="tg-xldj"><strong>OBJETIVO</strong></th>
            <th class="tg-xldj"><strong>META (expresada en %)</strong></th>
            <th class="tg-xldj"><strong>ACTIVIDADES (tareas para cada una de ellas)</strong></th>
            <th class="tg-0pky"><strong>RESPONSABLES</strong></th>
            <th class="tg-0pky"><strong>FECHA</strong></th>
            <th class="tg-0pky"><strong>VERIFICABLE O
                    INDICADOR</strong></th>
            <th class="tg-0pky"><strong>RESPONSABLE DE MONITOREO Y FECHA</strong></th>
        </tr>
        <tr>
            <td class="tg-xldj" rowspan="{{count($activitiesImprovementPlans)}}">{{$improvementPlan->objective}}</td>
            <td class="tg-xldj" rowspan="{{count($activitiesImprovementPlans)}}">{{$improvementPlan->scope}}</td>
            @foreach($activitiesImprovementPlans as $activitiesImprovementPlan)
                <td class="tg-xldj">{{$activitiesImprovementPlan->activity}}</td>
                <td class="tg-0pky">
                    @foreach($activityResponsables as $activityResponsable)
                        @if($activityResponsable->activity_id==$activitiesImprovementPlan->id)
                            {{$activityResponsable->labor}} {{$activityResponsable->name}} {{$activityResponsable->position}}<br/>
                        @endif
                    @endforeach
                </td>
                <td class="tg-0pky">{{$activitiesImprovementPlan->date}}</td>
                <td class="tg-0pky">{{$activitiesImprovementPlan->indicator}}<br /> {{$activitiesImprovementPlan->date_indicator}}</td>
                <td class="tg-0pky">@foreach($monitoringResponsables as $monitoringResponsable)
                        @if($monitoringResponsable->activity_id==$activitiesImprovementPlan->id)
                            {{$monitoringResponsable->position}} {{$monitoringResponsable->name}},<br />
                        @endif
                    @endforeach
                    : {{$activitiesImprovementPlan->detail_monitors}}<br/>
                    {{$activitiesImprovementPlan->date_monitoring}}
                </td>
        </tr>
            @endforeach


    </table>
</div>
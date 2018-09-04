<!DOCTYPE html>
<html>
<head>
    <style>
        .table.table-center{
            width: 840px;
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
        table,th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;

        }
        .report{
            word-wrap: break-word;
            border: 1px solid blueviolet;
            table-layout: fixed;
            text-align: left;
            margin: 0 auto;
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
</head>

<body>

    <br>
    <table style="width: 840px;">
        <tbody>
        <tr>
            <td>
                <strong>JEFE DE SERVICIO O UNIDAD:  {{$report->service_boss}}</strong><br>
                <strong>PROFESIONAL SUPERVISOR:     {{$report->supervisor}}</strong><br>
            </td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <table style="width: 840px;">
        <tbody>
        <tr>
            <td>
                <strong>INFORME REALIZADO POR:&nbsp;{{$report->report_writer}}</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <p></p>
    <table class="table table-responsive report" style="width:840px;">
        <tbody>
            <tr>
                <td  valign="top">Identificación del servicio o Unidad</td>
                <td  valign="top">{{ $report->place }}</td>
            </tr>
            <tr>
                <td  valign="top">Problema (incidente, evento adverso o centinela).
                    Se debe narrar la situación ocurrida, cronológicamente, con enfasis en los <strong>nodos críticos</strong> del proceso.
                </td>
                <td  valign="top">{{$report->narration}}</td>
            </tr><tr>
                <td>Fecha de ocurrencia</td>
                <td>{{$report->event_date}}</td>
            </tr><tr>
                <td  valign="top">Nombre de líder de equipo de investigación</td>
                <td  valign="top">{{$report->name_research_leader}}</td>
            </tr><tr>
                <td  valign="top">Participantes de análisis y diseño de plan de mejora</td>
                <td  valign="top">
                    <ul class="list-group">
                        @if(count($participants)===0)
                            <li>No se han agregado participantes</li>
                        @else
                            @foreach($participants as $participant)
                                <li class="list-group-item">{{$participant->name}}

                                </li>
                            @endforeach
                        @endif
                    </ul>
                </td>
            </tr><tr>
                <td  valign="top">Fechas de entrevistas, reuniones de análisis, revisión de registros clínicos, etc</td>
                <td  valign="top">
                    <ul class="list-group">
                        @if(count($report_dates)===0)
                            <li>No se han agregado fechas</li>
                        @else
                            @foreach($report_dates as $report_date)
                                <li class="list-group-item"><strong>{{$report_date->situation}}:</strong> {{$report_date->date_situation}}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </td>
            </tr><tr>
                <td  valign="top"><strong>Tipo de error:</strong> (especificar y desarrollar lo ocurrido).</td>
                <td  valign="top">
                    <strong>Acción insegura:</strong><br>
                    {{ $unsafe_action->type_error}}
                    <p></p>
                    <strong>Errores por acción: Planeación</strong><br>
                    {{ $unsafe_action->planningAction}}
                    <p></p>
                    <strong>Errores por acción: Ejecución</strong><br>
                    {{ $unsafe_action->executionAction }}
                    <p></p>
                    <strong>Errores por omisión: Planeación</strong><br>
                    {{ $unsafe_action->planningOmission }}
                    <p></p>
                    <strong>Errores por omisión: Ejecución</strong><br>
                    {{ $unsafe_action->executionOmission }}
                    <p></p>

                </td>
            </tr><tr>
                <td  valign="top"><strong>Factores Contributivos:</strong> (especificar y desarrollar).</td>
                <td  valign="top">
                    @foreach($contributory_factors as $contributory_factor)
                        <strong>{{$contributory_factor->origin}}</strong><br>
                        {{$contributory_factor->detail}}
                        <p></p>
                    @endforeach
                </td>
            </tr>
            </tr><tr>
                <td  valign="top">Identificación de causa raíz y de causas mayores si aplicaran</td>
                <td  valign="top">
                    <strong>Causa raíz:</strong><br>
                    {{ $cause->root_cause}}
                    <p></p>
                    <strong>Causas mayores:</strong><br>
                    {{ $cause->major_cause }}"
                </td>
            </tr>
        </tbody>


    </table>
</body>



</html>
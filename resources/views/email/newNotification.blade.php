<div >
    Se ha generado una nueva notificación en el sistema, algunos de los datos son:
    <div>
        <br>
    </div>
    <div>
        <ul>
            <li><b>Nombre del Paciente:&nbsp; </b>{{$patient_datas->name_patient}}<br>
            </li>
            <li>
                <b>Fecha evento:&nbsp; </b>{{$event_datas->event_date}}<br>
            </li>
            <li>
                <b>Consecuencias para el paciente:</b>{{$consequence->consequence}}<br>
            </li>
            <li>
                <b>Clasificación:&nbsp; </b>{{$classification->name_classification}}<br>
            </li>
            <li>
                <b>Subclasificación:&nbsp; </b>{{$event_name->name}}<br>
            </li>
            <li>
                <b>Descripción de lo ocurrido:&nbsp;</b>{{$event_datas->description}}<br>
            </li>
            <li>
                <b>Lugar de ocurrencia del evento:&nbsp; </b>{{$placeEvent->place}}<br>
            </li>
        </ul>
    </div>
    <div><br>
    </div>
</div>
<table class="table table-responsive" id="table">
    <thead>
        <th>Titular</th>
        <th>Numero de Acta</th>
        <th>Solicitante</th>
        <th>Tipo de Acta</th>
        <th>Estatus</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($solicituds as $solicitud)
        <tr>
            <td>{!! $solicitud->titular->nombres.' '.$solicitud->titular->apellidos.' '.$solicitud->titular->cedula !!}</td>
            <td>{!! $solicitud->numero_acta !!}</td>
            <td>{!! $solicitud->solicitante->nombre.' '.$solicitud->solicitante->apellido.' '.$solicitud->solicitante->cedula !!}</td>
            <td>{!! $solicitud->tipoacta->tipo !!}</td>
            <td>{!! $solicitud->estatus_tramite !!}</td>
            <td>
                {!! Form::open(['route' => ['solicituds.destroy', $solicitud->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('solicituds.show', [$solicitud->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('solicituds.edit', [$solicitud->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea eliminar esta solicitud?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

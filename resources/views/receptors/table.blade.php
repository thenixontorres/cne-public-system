<table class="table table-responsive" id="table">
    <thead>
        <th>Receptor</th>
        <th>Ubicacion</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($receptors as $receptor)
        <tr>
            <td>{!! $receptor->receptor !!}</td>
            <td>{!! $receptor->ubicacion !!}</td>
            <td>
                {!! Form::open(['route' => ['receptors.destroy', $receptor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('receptors.edit', [$receptor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea borrar este receptor?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

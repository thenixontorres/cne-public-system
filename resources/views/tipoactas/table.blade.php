<table class="table table-responsive" id="tipoactas-table">
    <thead>
        <th>Tipo</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($tipoactas as $tipoacta)
        <tr>
            <td>{!! $tipoacta->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoactas.destroy', $tipoacta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoactas.edit', [$tipoacta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea borrar este tipo de Acta?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

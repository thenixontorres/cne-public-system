<table class="table table-responsive" id="tipoactas-table">
    <thead>
        <th>Datos</th>
        <th>Email</th>
        <th>Tipo</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->nombre.' '.$user->apellido.' CI: '.$user->cedula !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Desea borrar este usuario?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

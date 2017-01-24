@extends('layouts.app')
@section('title','Editar Usuario')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Usuario</h1>
            </div>
        </div>
         <div class="row panel panel-default">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            @include('users.fields')

            {!! Form::close() !!}
        </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('users');
        opc.className = 'active';
    </script>
    <script src="{{ asset('/plugins/js/funciones.js') }}"></script>
@endsection
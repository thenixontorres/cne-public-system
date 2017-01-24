@extends('layouts.app')
@section('title','Registrar Usuarios')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar nuevo usuario</h1>
        </div>
    </div>
     <div class="row panel panel-default">
        {!! Form::open(['route' => 'users.store']) !!}

            @include('users.fields')

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('users');
        opc.className = 'active';
    </script>
@endsection

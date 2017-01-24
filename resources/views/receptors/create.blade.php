@extends('layouts.app')
@section('title','Registrar Receptor')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar Nuevo Receptor</h1>
        </div>
    </div>
     <div class="row panel panel-default">
           {!! Form::open(['route' => 'receptors.store']) !!}

            @include('receptors.fields')

        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('receptors');
        opc.className = 'active';
    </script>
@endsection

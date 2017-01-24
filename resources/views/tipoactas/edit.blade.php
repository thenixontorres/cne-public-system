@extends('layouts.app')
@section('title','Editar tipo de Actas')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar tipo de acta</h1>
            </div>
        </div>
         <div class="row panel panel-default">
            {!! Form::model($tipoacta, ['route' => ['tipoactas.update', $tipoacta->id], 'method' => 'patch']) !!}

            @include('tipoactas.fields')

            {!! Form::close() !!}
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('tipoactas');
        opc.className = 'active';
    </script>
@endsection

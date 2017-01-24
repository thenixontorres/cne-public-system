@extends('layouts.app')
@section('title','Nueva Solicitud')
@section('css')
    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.structure.css') }}">
    <!--chosen -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left"> Registrar Nueva Solicitud </h1>
        </div>
    </div>
        <div class="row panel panel-default">
            {!! Form::open(['route' => 'solicituds.store']) !!}

                @include('solicituds.fields')

            {!! Form::close() !!}
        </div>    
@endsection

@section('scripts')
    <!--Jqueyui -->
    <script src="{{ asset('plugins/jqueryui/jquery-ui.js') }}"></script>

    <script type="text/javascript">
          $(function() {
            $( "#fecha_acta" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });

          $(function() {
            $( "#fecha_solicitud" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
    </script>      

    <!-- Chosen -->
    <script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script> 
    <script type="text/javascript">
        $(".chosen-receptor").chosen({
            search_contains: true,
            no_results_text: "sin resultados"
        });

        $(".chosen-tipoacta").chosen({
            search_contains: true,
            no_results_text: "sin resultados"
        });
    </script>
    <script type="text/javascript">
        opc = document.getElementById('solicituds');
        opc.className = 'active';
    </script>
@endsection

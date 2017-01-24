@extends('layouts.app')
@section('title','Solicitudes')
@section('content')
        <h1 class="pull-left">Solicitudes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('solicituds.create') !!}">Nueva Solicitud</a>

        <div class="clearfix"></div>
        <div class="panel panel-default">        
        @include('solicituds.table')
        </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Ver _MENU_ entradas por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Viendo la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior ",
                    "next": " Proximo",
                }
            }
        });
    } );
</script>
    <script type="text/javascript">
        opc = document.getElementById('solicituds');
        opc.className = 'active';
    </script>
@endsection

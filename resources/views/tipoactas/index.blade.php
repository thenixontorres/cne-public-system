@extends('layouts.app')
@section('title','Tipos de Actas')
@section('content')
        <h1 class="pull-left">Tipos de Actas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoactas.create') !!}">Nuevo</a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
        @include('tipoactas.table')
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('tipoactas');
        opc.className = 'active';
    </script>
@endsection

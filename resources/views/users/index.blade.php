@extends('layouts.app')
@section('title','Usuarios')
@section('content')
        <h1 class="pull-left">Usuarios</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('users.create') !!}">Nuevo</a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
        @include('users.table')
        </div>
@endsection

@section('scripts')
	<script type="text/javascript">
		opc = document.getElementById('users');
		opc.className = 'active';
	</script>
@endsection

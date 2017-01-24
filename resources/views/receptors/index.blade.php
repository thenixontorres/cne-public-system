@extends('layouts.app')
@section('title','Receptores')
@section('content')
        <h1 class="pull-left">Receptores</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('receptors.create') !!}">Nuevo</a>
	    <div class="clearfix"></div>
    	<div class="panel panel-default">        
        @include('receptors.table')
    	</div>    
@endsection
@section('scripts')
	<script type="text/javascript">
		opc = document.getElementById('receptors');
		opc.className = 'active';
	</script>
@endsection

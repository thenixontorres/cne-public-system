@extends('layouts.app')
@section('title','Solicitud')
@section('content')

    @include('solicituds.show_fields')

    <div class="form-group">
           <a href="{!! route('solicituds.index') !!}" class="btn btn-default">Volver</a>
    </div>
@endsection

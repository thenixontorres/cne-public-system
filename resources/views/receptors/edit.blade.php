@extends('layouts.app')
@section('title','Editar receptor')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Receptor</h1>
            </div>
        </div>
         <div class="row panel panel-default">
           {!! Form::model($receptor, ['route' => ['receptors.update', $receptor->id], 'method' => 'patch']) !!}

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

@extends('layouts.app')
@section('title','Editar Solicitud')
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
                <h1 class="pull-left">Editar Solicitud</h1>
            </div>
        </div>

        <div class="row panel panel-default">
            {!! Form::model($solicitud, ['route' => ['solicituds.update', $solicitud->id], 'method' => 'patch']) !!}

            <!-- Titular Fiels -->
            <div class="form-group col-md-12">
                <h4>Datos de titular del acta o constancia:</h4>
            </div>
            <!-- Titular id -->
            {!! Form::hidden('titular_id', $solicitud->titular->id, ['class' => 'form-control']) !!}
            <!-- Nombres Field -->
            <div class="form-group col-md-12">
                {!! Form::label('tnombres', 'Nombre:') !!}
                {!! Form::text('tnombres', $solicitud->titular->nombres, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
            </div>

            <!-- Apellidos Field -->
            <div class="form-group col-md-12">
                {!! Form::label('tapellidos', 'Apellido:') !!}
                {!! Form::text('tapellidos', $solicitud->titular->apellidos, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
            </div>

            <!-- Cedula Field -->
            <div class="form-group col-md-12">
                {!! Form::label('tcedula', 'Cedula:') !!}
                {!! Form::text('tcedula', $solicitud->titular->cedula, ['class' => 'form-control','pattern' => '[0-9]{7,8}']) !!}
            </div>
            <hr>

            <!-- Solicitud Fiels -->
            <div class="form-group col-md-12">
            <h4>Informacion del acta o constancia:</h4>
            </div>
            <!-- Tipo Acta Field -->
            <div class="form-group col-md-12">
                {!! Form::label('tipoacta_id', 'Tipo de acta:') !!}
                   <select name="tipoacta_id" class="form-control chosen-tipoacta">
                     @foreach ($tipoactas as $tipoacta)
                        @if($tipoacta->id == $solicitud->tipoacta->id)
                            <option selected value="{{ $tipoacta->id }}">{{ $tipoacta->tipo }} 
                            </option>
                        @else
                            <option value="{{ $tipoacta->id }}">{{ $tipoacta->tipo }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Numero Acta Field -->
            <div class="form-group col-md-12">
                {!! Form::label('numero_acta', 'Numero de acta:') !!}
                {!! Form::number('numero_acta', null, ['class' => 'form-control','pattern' => '[0-9]{1,30}']) !!}
            </div>

            <!-- Fecha acta Field -->
            <div class="form-group col-md-12">
                {!! Form::label('fecha_acta', 'Año:') !!}
                {!! Form::text('fecha_acta', null, ['class' => 'form-control'],['id' => 'fecha_acta']) !!}
            </div>

            <!-- Receptor Id Field -->
            <div class="form-group col-md-12">
                {!! Form::label('receptor', 'Receptor de la solicitud:') !!}
                <select name="receptor_id" class="form-control chosen-receptor">
                    @foreach ($receptors as $receptor)
                        @if($receptor->id == $solicitud->receptor->id)
                            <option selected value="{{ $receptor->id }}">{{ $receptor->receptor.' '.$receptor->ubicacion }} 
                            </option>
                        @else
                            <option value="{{ $receptor->id }}">{{ $receptor->receptor.' '.$receptor->ubicacion }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <hr>

            <!-- Solicitante Fiels -->
            <div class="form-group col-md-12">
            <h4>Datos de Solicitante:</h4>
            </div>
            <!-- Solicitante id -->
            {!! Form::hidden('solicitante_id', $solicitud->solicitante->id, ['class' => 'form-control']) !!}
            <!-- Nombre Field -->
            <div class="form-group col-md-12">
                {!! Form::label('snombre', 'Nombre:') !!}
                {!! Form::text('snombre', $solicitud->solicitante->nombre, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
            </div>
            <!-- Apellido Field -->
            <div class="form-group col-md-12">
                {!! Form::label('sapellido', 'Apellido:') !!}
                {!! Form::text('sapellido', $solicitud->solicitante->apellido, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
            </div>
            <!-- Cedula Field -->
            <div class="form-group col-md-12">
                {!! Form::label('scedula', 'Cedula:') !!}
                {!! Form::text('scedula', $solicitud->solicitante->cedula, ['class' => 'form-control','pattern' => '[0-9]{7,8}']) !!}
            </div>
            <!-- Telefono Field -->
            <div class="form-group col-md-12">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono', $solicitud->solicitante->telefono, ['class' => 'form-control','pattern' => '[0-9]{11}']) !!}
            </div>
            <!-- Email Field -->
            <div class="form-group col-md-12">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', $solicitud->solicitante->email, ['class' => 'form-control']) !!}
            </div>
            <hr>

            <div class="form-group col-md-12">
            <h4>Datos de Emision:</h4>
            </div>

            <!-- solicitado a Field -->
            <div class="form-group col-md-12">
                {!! Form::label('solicitado_a', 'Solicitado a:') !!}
                {!! Form::text('solicitado_a', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Fecha solicitud Field -->
            <div class="form-group col-md-12">
                {!! Form::label('fecha_solicitud', 'Fecha de Solicitud:') !!}
                {!! Form::text('fecha_solicitud', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Receptor Id Field -->
            <div class="form-group col-md-12">
                {!! Form::label('via', 'Via:') !!}
                <select name="via" class="form-control">
                        @foreach ($vias as $via)
                        @if($via == $solicitud->via)
                            <option selected value="{{ $via }}">{{ $via }} 
                            </option>
                        @else
                            <option value="{{ $via }}">{{ $via }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Recibido -->
            <div class="form-group col-md-12">
                {!! Form::label('recibido', 'Recibido:') !!}
                <select name="recibido" class="form-control">
                @if($solicitud->recibido == 'Si')
                    <option selected value="Si">Si 
                    </option>
                    <option value="No">No 
                    </option>
                @else
                    <option value="Si">Si 
                    </option>
                    <option selected value="No">No 
                    </option>
                @endif    
                </select>
            </div>

            <!-- Estatus tramite Field -->
            <div class="form-group col-md-12">
                {!! Form::label('estatus_tramite', 'Estatus:') !!}
                <select name="estatus_tramite" class="form-control">
                    @foreach ($estatus as $estatu)
                        @if($estatu == $solicitud->estatus_tramite)
                            <option selected value="{{ $estatu }}">{{ $estatu }} 
                            </option>
                        @else
                            <option value="{{ $estatu }}">{{ $estatu }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Responsable Id Field -->
                {!! Form::hidden('responsable_id', Auth::user()->id, ['class' => 'form-control']) !!}

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('solicituds.index') !!}" class="btn btn-default">Cancelar</a>
            </div>

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
@endsection
@section('scripts')
    <script type="text/javascript">
        opc = document.getElementById('solicituds');
        opc.className = 'active';
    </script>
@endsection
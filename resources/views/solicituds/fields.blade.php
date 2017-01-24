<!-- Titular Fiels -->
<div class="form-group col-md-12">
    <h4>Datos de titular del acta o constancia:</h4>
</div>
<!-- Nombres Field -->
<div class="form-group col-md-12">
    {!! Form::label('tnombres', 'Nombre:') !!}
    {!! Form::text('tnombres', null, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-md-12">
    {!! Form::label('tapellidos', 'Apellido:') !!}
    {!! Form::text('tapellidos', null, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-md-12">
    {!! Form::label('tcedula', 'Cedula:') !!}
    {!! Form::text('tcedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}']) !!} 

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
            <option value="{{ $tipoacta->id }}">{{ $tipoacta->tipo }} 
            </option>
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
            <option value="{{ $receptor->id }}">{{ $receptor->receptor.' '.$receptor->ubicacion }} 
            </option>
        @endforeach
    </select>
</div>
<hr>

<!-- Solicitante Fiels -->
<div class="form-group col-md-12">
<h4>Datos de Solicitante:</h4>
</div>
<!-- Nombre Field -->
<div class="form-group col-md-12">
    {!! Form::label('snombre', 'Nombre:') !!}
    {!! Form::text('snombre', null, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!} 
</div>
<!-- Apellido Field -->
<div class="form-group col-md-12">
    {!! Form::label('sapellido', 'Apellido:') !!}
    {!! Form::text('sapellido', null, ['class' => 'form-control','pattern' => '[a-z A-Z]{1,30}']) !!} 
</div>
<!-- Cedula Field -->
<div class="form-group col-md-12">
    {!! Form::label('scedula', 'Cedula:') !!}
    {!! Form::text('scedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}']) !!}
</div>
<!-- Telefono Field -->
<div class="form-group col-md-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
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
            <option value="Memo">Memo 
            </option>
            <option value="Of">Of 
            </option>
            <option value="Web">Web 
            </option>
            <option value="WA">WA 
            </option>
    </select>
</div>

<!-- Recibido -->
<div class="form-group col-md-12">
    {!! Form::label('recibido', 'Recibido:') !!}
    <select name="recibido" class="form-control">
            <option value="Si">Si 
            </option>
            <option value="No">No 
            </option>
    </select>
</div>

<!-- Estatus tramite Field -->
<div class="form-group col-md-12">
    {!! Form::label('estatus_tramite', 'Estatus:') !!}
    <select name="estatus_tramite" class="form-control">
            <option value="Enviado"> Enviado
            </option>
            <option value="Recibido"> Recibido
            </option>
            <option value="Concluido"> Concluido
            </option>
            <option value="Otros"> Otros
            </option>
    </select>
</div>

<!-- Responsable Id Field -->
    {!! Form::hidden('responsable_id', Auth::user()->id, ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('solicituds.index') !!}" class="btn btn-default">Cancelar</a>
</div>

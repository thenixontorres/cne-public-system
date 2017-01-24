<div class="row panel panel-default">
    <!-- Titular Id Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('titular_id', 'Datos del titular:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">
        <p>{!! $solicitud->titular->nombres.' '.$solicitud->titular->apellidos !!}</p>
        <p>{!! 'CI: '.$solicitud->titular->cedula !!}</p>
    </div>

    <!-- Tipo Acta Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('tipo_acta', 'Tipo de acta:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">
        <p>{!! $solicitud->tipoacta->tipo !!}</p>
    </div>

    <!-- Numero Acta Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('numero_acta', 'Numero de acta:') !!}
    </div>
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->numero_acta !!}</p>
    </div>    
    
    <!-- Fecha acta Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('fecha_acta', 'Fecha del acta:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->fecha_acta !!}</p>
    </div>

    <!-- Receptor Id Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('receptor_id', 'Receptor:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">    
        <p>{!! $solicitud->receptor->receptor.' '.$solicitud->receptor->ubicacion !!}</p>
    </div>

    <!-- Solicitante Id Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('solicitante_id', 'Datos del solicitante:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->solicitante->nombre.' '.$solicitud->solicitante->apellido !!}</p>
        <p>{!! 'CI: '.$solicitud->solicitante->cedula!!} </p>
        <p>{!! 'Telefono: '.$solicitud->solicitante->telefono!!} </p>
        <p>{!! 'Email: '.$solicitud->solicitante->email!!}</p>
    </div>

    <!-- Solicitado  a Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('solicitado_a', 'Solicitado a:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->solicitado_a !!}</p>
    </div>

    <!-- fecha solicitud Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('fecha_solicitud', 'Fecha de Solicitud:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->fecha_solicitud !!}</p>
    </div>

    <!-- via Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('via', 'Via:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->via !!}</p>
    </div>

    <!-- recibido Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('recibido', 'Recibido:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->recibido !!}</p>
    </div>

    <!-- Estatus Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('estatus_tramite', 'Estatus del tramite:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">  
        <p>{!! $solicitud->estatus_tramite !!}</p>
    </div>

    <!-- Responsable Id Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('responsable_id', 'Responsable:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">    
        <p>{!! $solicitud->responsable->nombre.' '.$solicitud->responsable->apellido !!}</p>
        <p>{!! 'CI: '.$solicitud->responsable->cedula !!} </p> 
    </div>

    <!-- Created At Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('created_at', 'Registrado el:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">    
        <p>{!! $solicitud->created_at !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-md-12 panel-heading">
        {!! Form::label('updated_at', 'Ultima actualizacion:') !!}
    </div>    
    <div class="form-group col-md-12 panel-body">    
        <p>{!! $solicitud->updated_at !!}</p>
    </div>
</div>

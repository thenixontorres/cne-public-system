<!-- Receptor Field -->
<div class="form-group col-sm-12">
    {!! Form::label('receptor', 'Receptor:') !!}
    {!! Form::text('receptor', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    {!! Form::text('ubicacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('receptors.index') !!}" class="btn btn-default">Cancelar</a>
</div>

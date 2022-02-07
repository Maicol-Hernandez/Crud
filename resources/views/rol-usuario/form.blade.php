<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rol_nombre') }}
            {{ Form::text('rol_nombre', $rolUsuario->rol_nombre, ['class' => 'form-control' . ($errors->has('rol_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Rol Nombre']) }}
            {!! $errors->first('rol_nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
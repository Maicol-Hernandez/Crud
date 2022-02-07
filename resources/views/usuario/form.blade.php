<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $usuario->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('email', $usuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('identificacion') }}
                    {{ Form::text('identificacion', $usuario->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
                    {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('rol') }}
                        {{ Form::select('rol_id', $rol_usuarios, $usuario->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'rol']) }}
                        {!! $errors->first('rol_id', '<div class="invalid-feedback">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password') }}
                            {{ Form::text('password', $usuario->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'password']) }}
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</p>') !!}
                            </div>


                            <div class="form-group mb-3">
                                {{ Form::label('Photo') }}
                                <input class="form-control" type="file" placeholder="Photo" name="photo" id="potho">
                                {!! $errors->first('password', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="">
                                    @if(isset($usuario->photo))
                                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$usuario->photo }}" width="100" >
                                    @endif

                                </div>


                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
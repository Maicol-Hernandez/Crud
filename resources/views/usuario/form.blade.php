    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ isset($usuario->name)?$usuario->name:old('name') }}" name="name" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        {{ isset($empleado->primerApellido)?$empleado->primerApellido:old('primerApellido')  }}
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($usuario->email)?$usuario->email:old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo Rol') }}</label>
        <div class="col-md-6">
            {{ Form::select('tipo', $rol_usuarios, $usuario->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'rol']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="identificacion" class="col-md-4 col-form-label text-md-end">{{ __('Identificacion') }}</label>
        <div class="col-md-6">
            <input id="identificacion" type="umber" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ isset($usuario->identificacion)?$usuario->identificacion:old('identificacion') }}" required autocomplete="identificacion" autofocus>

            @error('identificacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

        <div class="col-md-6">
            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo" autofocus>

            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if(isset($usuario->photo))
            <img src="{{ asset('storage').'/'.$usuario->photo }}" class="mt-3 img-thumbnail img-fluid" width="150" alt="">
            @endif
        </div>

    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="isset($usario->password)?$usario->password:old('password')" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <!-- 
    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div> -->

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
    <!--                     
                </div>
            </div>
        </div>
    </div>
</div> -->
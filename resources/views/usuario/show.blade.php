@extends('layouts.app')

@section('template_title')
{{ $usuario->name ?? 'Show Usuario' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show Usuario ' . $usuario->name) }}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $usuario->name }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $usuario->email }}
                    </div>
                    <div class="form-group">
                        <strong>Identificacion:</strong>
                        {{ $usuario->identificacion }}
                    </div>
                    <div class="form-group">
                        <strong>Photo:</strong>
                        <img src="{{ asset('storage').'/'.$usuario->photo }}" class="mt-3 img-thumbnail img-fluid" width="150" alt="">
                    </div>
                    <div class="form-group">
                        <strong>Rol:</strong>

                        {{ $rol_usuarios[$usuario->tipo] }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
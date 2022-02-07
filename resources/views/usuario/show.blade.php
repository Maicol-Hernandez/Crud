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
                            <span class="card-title">Show Usuario</span>
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
                            {{ $usuario->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Rol Id:</strong>
                            <!-- {{ $usuario->rol_id }} -->
                            {{ $rol_usuarios[0]->rol_nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $rolUsuario->name ?? 'Show Rol Usuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Rol Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rol-usuarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rol Nombre:</strong>
                            {{ $rolUsuario->rol_nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

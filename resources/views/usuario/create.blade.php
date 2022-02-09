@extends('layouts.app')

@section('template_title')
Create Usuario
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @includeif('partials.errors')
            <div class="card">
                <div class="card-header">
                    <span class="card-title">{{ __('Crear usuario') }}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('usuario.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
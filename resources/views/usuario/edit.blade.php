@extends('layouts.app')

@section('template_title')
Update Usuario
@endsection

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            @includeif('partials.errors')

            <div class="card">
                <div class="card-header">
                    <span class="card-title"> {{__('Update Usuario ' . $usuario->name )}}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('usuario.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
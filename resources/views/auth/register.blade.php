@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tipo_doc" class="col-md-4 col-form-label text-md-end"> Tipo documento </label>
                                <div class="col-md-6">
                                    <select name="tipo_doc" id="tipo_doc" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <option value="DNI">DNI</option>
                                        <!-- Agregar más opciones según sea necesario -->
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="num_doc" class="col-md-4 col-form-label text-md-end"> Número documento </label>
                                <div class="col-md-6">
                                    <input id="num_doc" type="text" class="form-control @error('num_doc') is-invalid @enderror" name="num_doc" value="{{ old('num_doc') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono" class="col-md-4 col-form-label text-md-end"> Teléfono</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end"> Dirección</label>
                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Campo oculto para el rol -->
                            <input type="hidden" name="rol_id" value="2"> <!-- Cambia 2 por el ID correspondiente al rol 'cliente' -->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                    <a href="{{route('login')}}" class="btn btn-secondary">LOGIN</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

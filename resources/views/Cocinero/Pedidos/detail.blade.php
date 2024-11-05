<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}">
                        @csrf
                        @if(isset($usuario))
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            <input id="id_user" type="hidden" name="id" value="{{ $usuario->id ?? '' }}">
                            <div class="col-md-6">
                                <input id="id_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name ?? old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_doc" class="col-md-4 col-form-label text-md-end">Tipo documento</label>
                            <div class="col-md-6">
                                <select name="tipo_doc" id="id_tipo_doc" class="form-control" required>
                                    <option value="">Seleccione...</option>
                                    <option value="DNI" {{ (isset($usuario) && $usuario->tipo_doc == 'DNI') ? 'selected' : '' }}>DNI</option>
                                    <!-- Añadir otros tipos de documentos según sea necesario -->
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="num_doc" class="col-md-4 col-form-label text-md-end">Número documento</label>
                            <div class="col-md-6">
                                <input id="id_num_doc" type="text" class="form-control" name="num_doc" value="{{ $usuario->num_doc ?? old('num_doc') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">Teléfono</label>
                            <div class="col-md-6">
                                <input id="id_telefono" type="number" class="form-control" name="telefono" value="{{ $usuario->telefono ?? old('telefono') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección</label>
                            <div class="col-md-6">
                                <input id="id_direccion" type="text" class="form-control" name="direccion" value="{{ $usuario->direccion ?? old('direccion') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email ?? old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @if(!isset($usuario))
                            <div id="password" class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div id="passwordconfirm" class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ isset($usuario) ? __('Actualizar') : __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('admin.layout.app')
@section('title', 'Usuarios')

@section('content')

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detalle - Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.usuarios.detail')
                </div>
            </div>
        </div>
    </div>

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h1 class="page-title">Usuarios</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="nuevo();" class="btn btn-primary btn-block w-25">Nuevo</button>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table no-wrap">
                            <thead class="bg-warning">
                            <tr>
                                <th style="width:5%;">ID</th>
                                <th style="width:15%;">Nombre</th>
                                <th style="width:10%;">Teléfono</th>
                                <th style="width:20%;">Email</th>
                                <th style="width:20%;">Dirección</th>
                                <th style="width:12%;">Número Doc</th>
                                <th style="width:8%;">Rol</th> <!-- Nueva columna para el rol -->
                                <th style="width:8%;">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->telefono}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->direccion}}</td>
                                    <td>{{$row->num_doc}} - {{$row->tipo_doc}}</td>
                                    <td>{{$row->rol_id}}</td> <!-- Mostrar rol_id -->
                                    <td class="p-3 d-flex justify-center">
                                        <button type="button" data-bs-toggle="modal" onclick="editar({{$row->id}}, '{{$row->name}}', '{{$row->email}}', '{{$row->telefono}}', '{{$row->direccion}}', '{{$row->num_doc}}', {{$row->rol_id}});" data-bs-target="#staticBackdrop" class="btntb btn-primary btn-sm border border-2 mx-1">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        <a href="{{ route('usuarios.destroy', $row->id)}}" class="btn btn-warning btn-sm" onclick="return confirm('¿Estás Seguro de Eliminar?')">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editar(id, name, email, telefono, direccion, num_doc, rol_id) {
            $('#id_user').val(id);
            $('#id_name').val(name);
            $('#email').val(email);
            $('#id_telefono').val(telefono);
            $('#id_direccion').val(direccion);
            $('#id_num_doc').val(num_doc);
            $('#rol_id').val(rol_id); // Asignar rol_id
            $('#passwordconfirm').addClass('invisible');
            $('#password').addClass('invisible');
        }

        function nuevo() {
            $('#id_user').val(0);
            $('#id_name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#id_direccion').val('');
            $('#id_telefono').val(0);
            $('#id_num_doc').val(0);
            $('#rol_id').val(''); // Reiniciar rol_id
            $('#passwordconfirm').removeClass('invisible');
            $('#password').removeClass('invisible');
        }
    </script>

@endsection


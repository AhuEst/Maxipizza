@extends('layouts.app')
@section('title', 'Pedidos en Preparación')

@section('content')
<div class="container-fluid">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h1 class="page-title">Pedidos en Preparación</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table id="example" class="table no-wrap">
                            <thead class="bg-warning">
                                <tr>
                                    <th style="width:5%;">ID Pedido</th>
                                    <th style="width:25%;">Cliente</th>
                                    <th style="width:30%;">Items</th>
                                    <th style="width:10%;">Estado</th>
                                    <th style="width:15%;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordenesPendientes as $orden)
                                    {{$orden}}
                                    <tr>
                                        <td>{{ $orden->id }}</td>
                                        <td>{{ $orden->cliente }}</td>
                                        <td>
                                            @if ($orden->estado == 1)
                                                En preparación
                                            @elseif ($orden->estado == 2)
                                                Listo para entregar
                                            @else
                                                Desconocido
                                            @endif
                                        </td>
                                        <td class="d-flex justify-center">
                                            <form action="{{ route('cook.marcar_preparado', $orden->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm mx-1">
                                                    <i class="fas fa-utensils"></i> En preparación
                                                </button>
                                            </form>
                                            <form action="{{ route('cook.marcar_preparado', $orden->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm mx-1">
                                                    <i class="fas fa-check"></i> Listo
                                                </button>
                                            </form>
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
</div>
@endsection
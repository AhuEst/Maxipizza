@extends('admin.layout.app')
@section('title', 'pedidos-detalle')
@section('content')


<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h1 class="page-title">Pedidos</h1>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="white-box">
                <div class="container-fluid">
                    @foreach($orden_detalle as $row)
                        <div class="bag-item full-box ">
                            <div class="full-box">
                                <div class="row ">
                                    <div class="col-12 col-lg-2 text-left mt-2">
                                        <img src='{{asset("platos/$row->Imagen")}}' class="img-fluid" style="border-radius:5px;"  height="20px" width="60px"  alt="platillo_nombre">
                                    </div>
                                    <div class="col-12 col-lg-3 text-left mt-3">
                                        <label for="product_cant_1" class="form-label h4">{{$row->Nombre}}</label>
                                    </div>
                                    <div class="col-12 col-lg-3 text-left mt-3">
                                        <label for="product_cant_1" class="form-label h4">cantidad-{{$row->cantidad}}</label>
                                    </div>
                                    <div class="col-12 col-lg-4 text-rigth mt-3">
                                        <span class="poppins-regular font-weight-bold h4">SUBTOTAL: &nbsp; {{$row->cantidad*$row->Precio}} CLP</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="height: 2px; margin: 0rem;">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="white-box">
                <div class="container-fluid">
                    @php
                        $cliente=""; $email=""; $telefone=""; $direccion="";
                        $id=0 ;  $total=0;
                    @endphp
                    @foreach ($orden_detalle as $row)
                        @php
                        $cliente= $row->name; $email= $row->email; $telefone= $row->telefono; $direccion= $row->direccion; $id=$row->id_orden;  $total=$row->total;
                        @endphp
                    @endforeach
                    <div class="row">
                        <P class="text-primary text-decoration-underline text-center" >DATOS DEL CLIENTE</P>
                        <div class="col-12 col-lg-12 text-left text-info" >
                            <label for="product_cant_1" class="form-label mt-2 h5 ">CLIENTE: {{$cliente}}</label>
                            <hr style="height: 1px; margin: 0rem;">
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">
                            <label for="product_cant_1" class="form-label mt-2 h5">EMAIL: {{$email}}</label>
                            <hr style="height: 1px; margin: 0rem;">
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">
                            <label for="product_cant_1" class="form-label mt-2 h5">TELEFONO: {{$telefone}}</label>
                            <hr style="height: 1px; margin: 0rem;">
                        </div>
                        <div class="col-12 col-lg-12 text-left text-info">
                            <label for="product_cant_1" class="form-label mt-2 h5">DIRECCION: {{$direccion}}</label>
                            <hr style="height: 1px; margin: 0rem;">
                        </div>
                        <div class="col-12 col-lg-12 text-left text-danger">
                            <label for="product_cant_1" class="form-label mt-2 h5">TOTAL A PAGAR: {{$total}} CLP</label>
                            <hr style="height: 1px; margin: 0rem;">
                        </div>
                        <br>
                        <br>
                        <a  href="{{ route('orden.finalizar', $id)}}" class="btn btn-success text-light" onclick="return confirm('¿ Estas Seguro finalizar pedido?')"> Finalizar Pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

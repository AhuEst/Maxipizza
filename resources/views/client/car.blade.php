@extends('layouts.app')
@section('content')
	<section class="container-cart ">
	    <div class="container container-web-page">
	        <h3 class="font-weight-bold poppins-regular text-uppercase">Carrito de compras</h3>
	        <hr>
	    </div>
		@if (Route::has('login'))
			@auth
			<div class="container" style="padding-top: 40px;">
				<div class="row">
					<div class="col-12 col-md-7 col-lg-8">
						<div class="container-fluid">
							@foreach($carrito as $row)
								<h5 class="poppins-regular font-weight-bold full-box text-center">{{$row->Nombre}}</h5>
								<div class="bag-item full-box">
									<figure class="full-box">
										<img src='{{asset("platos/$row->Imagen")}}' class="img-fluid" style="border-radius:5px;" alt="platillo_nombre">
									</figure>
									<div class="full-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-12 col-lg-6 text-center mb-4">
													<div class="row justify-content-center">
														<form action="{{ route('carrito.store')}}" method="POST" enctype="multipart/form-data" >
															@csrf
															<div class="row">
																<div class="col-12 col-md-6 text-center">
																	<div class="form-outline mb-4">
																		<input type="text" name="cantidad" value="{{$row->cantidad}}" class="form-control text-center" id="product_cant_1" pattern="[0-9]{1,10}" maxlength="10" style="max-width: 100px; ">
																		<label for="product_cant_1" class="form-label">cantidad</label>
																	</div>
																</div>
																<div class="col-12 col-md-6 text-center">
																		<input type="hidden" name="id" value="{{$row->id_carrito}}">
																		<input type="hidden" name="id_platos" value="{{$row->id}}">
																		<button type="submit" class="btn btn-success" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Actualizar cantidad" ><i class="fas fa-sync-alt fa-fw"></i></button>
																</div>
															</div>
														</form>
													</div>
												</div>
												<div class="col-12 col-lg-4 text-center mb-4">
													<span class="poppins-regular font-weight-bold" >SUBTOTAL: {{$row->cantidad*$row->Precio}} CLP</span>
												</div>
												<div class="col-12 col-lg-2 text-center text-lg-end mb-4">
													<a  href="{{ route('carrito.destroy', $row->id_carrito)}}" class="btn btn-warning btn-sm" onclick="return confirm('¿ Estas Seguro Eliminar?')"> <i class="fas fa-trash-alt"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr>
							@endforeach
						</div>
					</div>
					<div class="col-12 col-md-5 col-lg-4">
						@php
							$subtotal=0;
							$envio=10;
							$id_carrito=0;
							foreach ($carrito as $row){
								$subtotal += ($row->Precio*$row->cantidad);
								$id_carrito = ($row->id_carrito);
							}
							$total=$subtotal+$envio;

						@endphp

						<div class="full-box div-bordered">
							<h5 class="text-center text-uppercase bg-success" style="color: #FFF; padding: 10px 0;">Resumen de la orden</h5>
							<ul class="list-group bag-details">
								<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
									Subtotal
									<span>{{$subtotal}} CLP</span>
								</a>
								<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
									Envio
									<span>{{$envio}} CLP</span>
								</a>
								<a class="list-group-item d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #E1E1E1;"></a>
								<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
									Total
									<span>{{$total}} CLP</span>
								</a>
							</ul>
							<p class="text-center">
								<form action="{{route('ordencreate')}}" method="POST">
									@csrf
									<input type="hidden" name="subtotal" value="{{$total}}">
									<input type="hidden" name="envio" value="{{$envio}}">
									<button type="submit" class="btn btn-primary">Confirmar orden</button>
								</form>
							</p>
						</div>
					</div>
				</div>
			</div>
			@else
			<div class="container">
				<p class="text-center" ><i class="fas fa-shopping-bag fa-5x"></i></p>
				<h4 class="text-center poppins-regular font-weight-bold" >Carrito de compras vacío</h4>
			</div>
			@endauth
		@endif
	</section>
@endsection

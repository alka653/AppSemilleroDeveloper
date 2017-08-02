<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name','Laravel') }}</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo.css') }}">
	</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-fixed-top tradeo border-aleviar" role="navigation">
		<div class="container">
			<div class="navbar-header">
			<a id='nav-text' class="navbar-brand" href="{{URL::route('index')}}">
						{{config('app.name', 'Laravel')}}
				</a>
				<button type="button" class="navbar-toggle tradeo" id="nav-text" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<span id="nav-icon-primary" class="sr-only btn-success">Toggle navigation</span>
					<span id="nav-icon-primary" class="icon-bar"></span>
					<span id="nav-icon-primary" class="icon-bar"></span>
					<span id="nav-icon-primary" class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					<li>
						<a id='nav-text' href="{{URL::route('index','#quienes_somos')}}">Quiénes somos</a>
					</li>
					<li>
						<a id='nav-text' href="{{URL::route('index','#vision')}}">Visión</a>
					</li>
					<li>
						<a id='nav-text' href="{{URL::route('index','#mision')}}">Misión</a>
					</li>
						<li><a id='nav-text' href="{{ URL::route('login') }}">Iniciar sesión</a></li>
					<li><a id='nav-text' href="{{ route('register') }}">Registarse</a></li>
					@else
						<li>
							<a id='nav-text' href="{{URL::route('home')}}"><i class="glyphicon glyphicon-home"></i> Inicio</a>
						</li>
						<li id="nav-text" class="dropdown">
						  <a id="dLabel" data-target="#" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="glyphicon glyphicon-leaf"></i> Cultivo
							<span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" aria-labelledby="dLabel">
							<li>
								<a id="nav-text" href="javascript:void(0);" data-toggle="modal" data-target="#modal-of-cultivation">Cultivación</a>
							</li>
							<li>
								<a id="nav-text" href="">Realizar seguimiento</a>
							</li>
							<li>
								<a id="nav-text" href="">Perdidas</a>
							</li>
						  </ul>
						</li>
						<li id="nav-text" class="dropdown">
						  <a id="dLabel1" data-target="#" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-briefcase"></span> Movimientos
							<span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" aria-labelledby="dLabel1">
							<li>
								<a id="nav-text" href="{{URL::route('index','#vision')}}">Ingresos</a>
							</li>
							<li>
							<a id='nav-text' href="javascript:void(0);" data-toggle="modal" data-target="#modal-of-cost">Costos</a>
							</li>
							<li>
								<a id='nav-text' href="javascript:void(0);" data-toggle="modal" data-target="#modal-of-expense">Gastos</a>
							</li>
						  </ul>
						</li>
						<li class="dropdown">
							<a id="nav-text" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
						 <li><a id='nav-text' href="javascript:void(0);" data-toggle="modal" data-target="#modal-of-service"><span class="glyphicon glyphicon-list-alt"></span> Servicio y materia prima</a></li>
							<li>
							<li><a id='nav-text' href="javascript:void(0);" data-toggle="modal" data-target="#modal-of-product"><span class="glyphicon glyphicon-inbox"></span> Producto</a></li>
							<li>
								<a id='nav-text' href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Cerrar sección</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
							</li>
						</ul>
						</li>
					@endif
				</ul>

			</div>
		</div>
	</nav>
	@yield('content')
	@if(!Auth::guest())
		<div class="modal fade" id="modal-of-cultivation" tabindex="-1" role="dialog" aria-labelledby="modal-of-cultivation">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-aleviar">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span id="nav-text" class="glyphicon glyphicon-remove-circle"></span></span></button>
						<h4 class="modal-title" id="modal-of-cultivation">Registro de cultivación</h4>
					</div>
					<form action="{{URL::route('create_cultivation',['idUser'=>Auth::user()->id])}}" method="POST">
						{{csrf_field()}}
						<div class="modal-body">
								<div class="form-horizontal">
							@if(session('status-success-cultivation'))
								<div class="alert alert-success alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									{{session('status-success-cultivation')}}                                   
								</div>
							@endif
							@if(session('status-danger-cultivation'))
								<div class="alert alert-danger alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									{{session('status-danger-cultivation')}}                                   
								</div>
							@endif
							@if(count($errors->cultivation)>0)
								<div class="from-group">
								<div class="alert alert-warning alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
								@foreach($errors->cultivation->all() as $error)
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  {{$error}}<br>
								@endforeach                                    
								</div>  
								</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="cantidad_de_hectareas">Cantidad de hectereas</label>
										<div class="col-lg-9">
											<input type="text" name="cantidad_de_hectareas" class="form-control" value="<?php echo session('data')['cantidad_de_hectareas']?>">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Etapa</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($products as $product)
													<option value="{{$product->id}}" <?php if(session('data')['seleccionado']==$product->id){ echo "selected";}?> >{{$product->name_product}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@else
								<div class="form-group">
										<label class="col-lg-3 control-label" for="cantidad_de_hectareas">Cantidad de hectereas</label>
										<div class="col-lg-9">
											<input type="text" name="cantidad_de_hectareas" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Producto a cultivar</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($products as $product)
													<option value="{{$product->id}}">{{$product->name_product}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@endif
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-8">
											<button type="submit" class="btn btn-success border-aleviar tradeo"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
										</div>
									</div>
								</div>    
							</div>           
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-of-product" tabindex="-1" role="dialog" aria-labelledby="modal-of-product">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-aleviar">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span id="nav-text" class="glyphicon glyphicon-remove-circle"></span></span></button>
						<h4 class="modal-title" id="modal-of-product">Registro de producto</h4>
					</div>
					<form action="{{URL::route('create_product')}}" method="POST">
						{{csrf_field()}}
						<div class="modal-body">
								<div class="form-horizontal">
							@if(session('status-success-product'))
								<div class="alert alert-success alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									{{session('status-success-product')}}                                   
								</div>
							@endif
							@if(session('status-danger-product'))
								<div class="alert alert-danger alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									{{session('status-danger-product')}}                                   
								</div>
							@endif
							@if(count($errors->product)>0)
								<div class="from-group">
								<div class="alert alert-warning alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
								@foreach($errors->product->all() as $error)
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  {{$error}}<br>
								@endforeach                                    
								</div>  
								</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="nombre">Nombre</label>
										<div class="col-lg-9">
											<input type="text" name="nombre" class="form-control" value="<?php echo session('data')['nombre']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="dias_de_cosecha">Dias de cosecha</label>
										<div class="col-lg-9">
											<input type="text" name="dias_de_cosecha" class="form-control" value="<?php echo session('data')['dias_de_cosecha']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control" value="<?php echo session('data')['precio']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="numero_de_arboles_promedio">Numero de arboles promedio</label>
										<div class="col-lg-9">
											<input type="text" name="numero_de_arboles_promedio" class="form-control" value="<?php echo session('data')['numero_de_arboles_promedio']?>">
										</div>
									</div>
							@else
									<div class="form-group">
										<label class="col-lg-3 control-label" for="nombre">Nombre</label>
										<div class="col-lg-9">
											<input type="text" name="nombre" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="dias_de_cosecha">Dias de cosecha</label>
										<div class="col-lg-9">
											<input type="text" name="dias_de_cosecha" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="numero_de_arboles_promedio">Numero de arboles promedio</label>
										<div class="col-lg-9">
											<input type="text" name="numero_de_arboles_promedio" class="form-control">
										</div>
									</div>
							@endif
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-8">
											<button type="submit" class="btn btn-success border-aleviar tradeo"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
										</div>
									</div>
								</div>    
							</div>           
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-of-service" tabindex="-1" role="dialog" aria-labelledby="modal-of-service">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-aleviar">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span id="nav-text" class="glyphicon glyphicon-remove-circle"></span></span></button>
						<h4 class="modal-title" id="modal-of-service">Registro de servicio y materia prima</h4>
					</div>
					<form action="{{URL::route('create_service')}}" method="POST">
						{{csrf_field()}}
						<div class="modal-body">
								<div class="form-horizontal">
							@if(session('status-success-service'))
								<div class="alert alert-success alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									{{session('status-success-service')}}                                   
								</div>
							@endif
							@if(session('status-danger-service'))
								<div class="alert alert-danger alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									{{session('status-danger-service')}}                                   
								</div>
							@endif
							@if(count($errors->service)>0)
								<div class="from-group">
								<div class="alert alert-warning alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
								@foreach($errors->service->all() as $error)
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  {{$error}}<br>
								@endforeach                                    
								</div>  
								</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="cantidad de hectereas">Descripción</label>
										<div class="col-lg-9">
											<input type="text" name="descripción" class="form-control" value="<?php echo session('data')['descripción']?>">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Etapa</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												<option value="1" <?php if (session('data')['seleccionado']=="1"){ echo "selected";}?> >Establecimiento</option>
												<option value="2" <?php if (session('data')['seleccionado']=="2"){ echo "selected";}?>>Formación</option>
												<option value="3" <?php if (session('data')['seleccionado']=="3"){ echo "selected";}?>>Producción</option>
												<option value="4" <?php if (session('data')['seleccionado']=="4"){ echo "selected";}?> >Comercialización</option>
											</select>
										</div>
									</div>
							@else
								<div class="form-group">
									<label class="col-lg-3 control-label" for="descripción">Descripción</label>
									<div class="col-lg-9">
										<input type="text" name="descripción" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="seleccionado" class="col-lg-3 control-label">Etapa</label>
									<div class="col-lg-9">
										<select class="form-control" name="seleccionado">
											<option value="1">Establecimiento</option>
											<option value="2">Formación</option>
											<option value="3">Producción</option>
											<option value="4">Comercialización</option>
										</select>
									</div>
								</div>
							@endif
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-8">
											<button type="submit" class="btn btn-success border-aleviar tradeo"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
										</div>
									</div>
								</div>    
							</div>           
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-of-cost" tabindex="-1" role="dialog" aria-labelledby="modal-of-cost">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-aleviar">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span id="nav-text" class="glyphicon glyphicon-remove-circle"></span></span></button>
						<h4 class="modal-title" id="modal-of-cost">Registro de costo</h4>
					</div>
					<form action="{{URL::route('create_cost',['idCultivation'=>Auth::user()->cultivation])}}" method="POST">
						{{csrf_field()}}
						<div class="modal-body">
								<div class="form-horizontal">
							@if(session('status-success-cost'))
								<div class="alert alert-success alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									{{session('status-success-cost')}}                                   
								</div>
							@endif
							@if(session('status-danger-cost'))
								<div class="alert alert-danger alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									{{session('status-danger-cost')}}                                   
								</div>
							@endif
							@if(count($errors->cost)>0)
								<div class="from-group">
								<div class="alert alert-warning alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
								@foreach($errors->cost->all() as $error)
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  {{$error}}<br>
								@endforeach                                    
								</div>  
								</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="concepto">Concepto</label>
										<div class="col-lg-9">
											<input type="text" name="concepto" class="form-control" value="<?php echo session('data_cost')['concepto']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control" value="<?php echo session('data_cost')['precio']?>">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Servicio o materia prima</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($services as $service)
													<option value="{{$service->id}}" <?php if(session('data_cost')['seleccionado']==$service->id){ echo "selected";}?> >{{$service->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@else
									<div class="form-group">
										<label class="col-lg-3 control-label" for="concepto">Concepto</label>
										<div class="col-lg-9">
											<input type="text" name="concepto" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Servicio o materia prima</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($services as $service)
													<option value="{{$service->id}}">{{$service->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@endif
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-8">
											<button type="submit" class="btn btn-success border-aleviar tradeo"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
										</div>
									</div>
								</div>    
							</div>           
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-of-expense" tabindex="-1" role="dialog" aria-labelledby="modal-of-expense">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-aleviar">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span id="nav-text" class="glyphicon glyphicon-remove-circle"></span></span></button>
						<h4 class="modal-title" id="modal-of-expense">Registro de Gasto</h4>
					</div>
					<form action="{{URL::route('create_expense',['idCultivation'=>Auth::user()->cultivation])}}" method="POST">
						{{csrf_field()}}
						<div class="modal-body">
								<div class="form-horizontal">
							@if(session('status-success-expense'))
								<div class="alert alert-success alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
									{{session('status-success-expense')}}                                   
								</div>
							@endif
							@if(session('status-danger-expense'))
								<div class="alert alert-danger alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									{{session('status-danger-expense')}}                                   
								</div>
							@endif
							@if(count($errors->expense)>0)
								<div class="from-group">
								<div class="alert alert-warning alert-dismissible fade in border-aleviar" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></span></button>
								@foreach($errors->expense->all() as $error)
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  {{$error}}<br>
								@endforeach                                    
								</div>  
								</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="concepto">Concepto</label>
										<div class="col-lg-9">
											<input type="text" name="concepto" class="form-control" value="<?php echo session('data_expense')['concepto']?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control" value="<?php echo session('data_expense')['precio']?>">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Servicio o materia prima</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($services as $service)
													<option value="{{$service->id}}" <?php if(session('data_expense')['seleccionado']==$service->id){ echo "selected";}?> >{{$service->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@else
									<div class="form-group">
										<label class="col-lg-3 control-label" for="concepto">Concepto</label>
										<div class="col-lg-9">
											<input type="text" name="concepto" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label" for="precio">Precio</label>
										<div class="col-lg-9">
											<input type="text" name="precio" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="seleccionado" class="col-lg-3 control-label">Servicio o materia prima</label>
										<div class="col-lg-9">
											<select class="form-control" name="seleccionado">
												@foreach($services as $service)
													<option value="{{$service->id}}">{{$service->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
							@endif
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-8">
											<button type="submit" class="btn btn-success border-aleviar tradeo"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Guardar</button>
										</div>
									</div>
								</div>    
							</div>           
					</form>
				</div>
			</div>
		</div>
	@endif
</div>
		@if(count($errors->service)>0 || session('status-danger-service') || session('status-success-service'))
			<script type="text/javascript">
				$('#modal-of-service').modal('show');
			</script>
		@endif
		@if(count($errors->cultivation)>0 || session('status-danger-cultivation') || session('status-success-cultivation'))
			<script type="text/javascript">
				$('#modal-of-cultivation').modal('show');
			</script>
		@endif
		@if(count($errors->product)>0 || session('status-danger-product') || session('status-success-product'))
			<script type="text/javascript">
				$('#modal-of-product').modal('show');
			</script>
		@endif
		@if(count($errors->cost)>0 || session('status-danger-cost') || session('status-success-cost'))
			<script type="text/javascript">
				$('#modal-of-cost').modal('show');
			</script>
		@endif
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>

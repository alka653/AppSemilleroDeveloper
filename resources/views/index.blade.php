@extends('layouts.app')
@section('import')
	@include('imports.importOne')
@endsection
@section('content')
	<header class="fondo">
		<h1 class="title text-center" style="height: 400px;color:white;text-shadow: -2px -2px 1px black;">
		@for($i=0;$i<8;$i++)<br>@endfor
		Bienvenido al control agricola
		</h1>
	</header>
	<div class="row">
		<div id="quienes_somos"></div>
	</div>
	</br></br>
		<div class="container">
<div class="row">
		<dir class="col-lg-12" style="color: black">
			<h2>Quienes somos</h2>
			<br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>

			<div id="vision"></div>
		</dir>
	</div>
	<hr>
		<div class="row">
		<dir class="col-lg-12" style="color: black">
			<h2>Visión</h2>
			<br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>
				<div id="mision"></div>
		</dir>
	</div>
	<hr>
	<div class="row">
		<dir class="col-lg-12" style="color: black">
			<h2>Misión</h2>
				<br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>
				<br><br><br><br>
				<br>
		</dir>
	</div>
	<hr>
</div>
<footer class="bs-docs-header tradeo">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Contactanos</h4>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h5>Cel:***********</h5>	
			</div>
		</div>

	</div>
</footer>
@endsection
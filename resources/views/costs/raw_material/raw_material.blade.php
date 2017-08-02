@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading " style="font-size: 120%" id="nav-text">Materia prima</div>
                <div class="panel-body">
                    <div class="list-group">
                      <a href="{{URL::route('fertilizer_purchase')}}" class="list-group-item">Compra de abonos</a>
                      <a href="{{URL::route('buying_trees')}}" class="list-group-item">Compra de árboles</a>
                      <a href="{{URL::route('fumigation_service')}}" class="list-group-item">Servicio de fumigación</a>
                      <a href="{{URL::route('reservoir')}}" class="list-group-item">Reservorio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
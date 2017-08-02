@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading " style="font-size: 120%" id="nav-text">Mano de obra</div>
                <div class="panel-body">
                    <div class="list-group">
                      <a href="{{URL::route('tree_planting')}}" class="list-group-item">Platación de árbol</a>
                      <a href="{{URL::route('garbage_collection')}}" class="list-group-item">Recolección de basura</a>
                      <a href="{{URL::route('harvest_collection')}}" class="list-group-item">Recolección de cosecha</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading border-aleviar" id="nav-text" style="font-size:120%">{{"Bienvenido ".Auth::user()->name." al control agricola" }}</div>
                <div class="panel-body">
                    @if(Auth::user()->cultivation>0)
                        {{"El cultivo N° ".Auth::user()->cultivation." se le esta haciendo segimiento actualmente."}}
                    @else
                        No ha seleccionado ningun cultivo.
                    @endif
                </div>
            </div>.
        </div>
    </div>
</div>
@endsection

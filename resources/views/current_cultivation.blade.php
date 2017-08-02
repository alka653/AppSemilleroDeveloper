@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="alert alert-danger" role="alert">El cultivo N° 1 que acabo de solicitar segumiento no existe en el sistema</div>
            <div class="panel panel-default">
                <div id="nav-text" class="panel-heading" style="font-size: 120%">
                    <div class="row">
                        <div class="col-lg-4" style="font-size:105%;margin-top: -0.4%">
                            <h4>Realizar seguimiento</h4>
                        </div> 
                    </div>    
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cultivo a realizar seguimiento</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success tradeo">
                                  Hacer seguimiento
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

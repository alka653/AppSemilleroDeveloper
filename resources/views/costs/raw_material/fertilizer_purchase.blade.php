@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div id="nav-text" class="panel-heading" style="font-size: 120%">
                <div class="row">
                    <div class="col-lg-3" style="font-size:105%;margin-top: -0.4%">
                    <h4>Compra de abono</h4>
                </div> 
                <div class="col-lg-4">
                    <button type="button" class="btn btn-success tradeo" data-toggle="modal" data-target="#myModal">Agregar</button>&nbsp&nbsp<button type="button" class="btn btn-success tradeo">Modificar</button>&nbsp&nbsp<button type="button" class="btn btn-success tradeo">Eliminar</button>
                </div>
                </div>    
                </div>                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th id="nav-text">------------</th>
                                    <th id="nav-text">------------</th>
                                    <th id="nav-text">------------</th>
                                    <th id="nav-text">------------</th>
                                    <th id="nav-text">------------</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="col-lg-4 col-lg-offset-4">
                            
                        </div>
                    </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear un nuevo de registro de compra de abono</h4>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success tradeo" data-dismiss="modal">Guardar</button>
              </div>
            </div>
          </div>
        </div>
    </form>
@endsection
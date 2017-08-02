@extends('layouts.app')
@section('import')
    @include('imports.importOne')
@endsection
@section('content')
<div class="container" style="margin-top: 60px">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div id="nav-text" class="panel-heading" style="font-size: 150%">
                    Cultivación
                </div>
                <div class="panel-body">
                     <div class="panel panel-default">
                        <div id="nav-text" class="panel-heading" style="font-size: 150%">
                            <button type="button" class="btn btn-success tradeo" data-toggle="modal" data-target="#myModal">Agregar</button>&nbsp&nbsp<button type="button" class="btn btn-success tradeo">Modificar</button>&nbsp&nbsp<button type="button" class="btn btn-success tradeo">Eliminar</button></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th id=q"nav-text"></th>
                                        <th id="nav-text">Cultivo N°</th>
                                        <th id="nav-text">-----------------</th>
                                        <th id="nav-text">-----------------</th>
                                        <th id="nav-text">-----------------</th>
                                        <th id="nav-text">-----------------</th>
                                        <th id="nav-text">-----------------</th>
                                        <th id="nav-text">-----------------</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" value=""></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" value=""></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
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
                <h4 class="modal-title" id="myModalLabel">Crear un nuevo de registro de Cultivación</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-4 control-label">Tipo de cultivo</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="ree">
                                <option value="1" selected>Mango</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success tradeo">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
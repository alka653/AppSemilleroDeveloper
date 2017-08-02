<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;
use App\Product;
use App\Cultivation;
use App\User;
use App\Move;
use Exception;
use Illuminate\Support\Facades\Log;

class ControllerCosts extends Controller
{
    /**
    * @return view of home
    */
    public function createCost(Request $request, $idCultivation)
    {
        $validator = Validator::make($request->all(), [
            'concepto' => 'required|max:100',
            'precio' =>'required|numeric|positive',
            'seleccionado'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator,'cost')->with('data_cost',['concepto'=>$request->input('concepto'),'precio'=>$request->input('precio'),'seleccionado'=>$request->input('seleccionado')]);
        }
        if($idCultivation==0){
             return  redirect()->route('home')->with('status-danger-cost','Seccione el cultivo al cual desea generar un costo.');
        }
        $move = new move();
        $move->detail = $request->input('concepto');
        $move->price = $request->input('precio');
        $move->type_of_move = 'C';
        $move->id_service = $request->input('seleccionado');
        $move->id_cultivation = $idCultivation;
        try {
            $move->save();
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return  redirect()->route('home')->with('status-danger-cost','No se guardo por causa de un error: '.$e);
        }
        return redirect()->route('home')->with('status-success-cost','Se creo exitosamente.');
    }
}
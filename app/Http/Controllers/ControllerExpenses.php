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
class ControllerExpenses extends Controller
{
	/**
    * @return view of home
    */
    public function createExpense(Request $request, $idCultivation)
    {
        $validator = Validator::make($request->all(), [
            'concepto' => 'required|max:100',
            'precio' =>'required|numeric|positive',
            'seleccionado'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator,'expense')->with('data_expense',['concepto'=>$request->input('concepto'),'precio'=>$request->input('precio'),'seleccionado'=>$request->input('seleccionado')]);
        }
        if($idCultivation==0){
             return  redirect()->route('home')->with('status-danger-expense','Seccione el cultivo al cual desea generar un gasto.');
        }
        $move = new move();
        $move->detail = $request->input('concepto');
        $move->price = $request->input('precio');
        $move->type_of_move = 'G';
        $move->id_service = $request->input('seleccionado');
        $move->id_cultivation = $idCultivation;
        try {
            $move->save();
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return  redirect()->route('home')->with('status-danger-expense','No se guardo por causa de un error: '.$e);
        }
        return redirect()->route('home')->with('status-success-expense','Se creo exitosamente.');
    }
}

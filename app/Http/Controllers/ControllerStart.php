<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Service;
use App\Product;
use App\Cultivation;
use App\User;
use Exception;
use Illuminate\Support\Facades\Log;
class ControllerStart extends Controller
{
	/**
	*@return view of index
	*/
    public function index()
    {
        return view('index');
    }
    /**
    * @return view of home
    */
    public function createService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripción' => 'required|max:45',
        ]);
        if ($validator->fails()){
            return redirect()->route('home')->withErrors($validator,'service')->with('data',['descripción'=>$request->input('descripción'),'seleccionado'=>$request->input('seleccionado')]);
        }

        $service = new service();
        $service->name = $request->input('descripción');
        $service->phase = (int)$request->input('seleccionado');
        try {
            $service->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return  redirect()->route('home')->with('status-danger-service','El servicio no se guardo por causa de un error.');
        }
        return redirect()->route('home')->with('status-success-service','Se creo exitosamente.');
    }
    /**
    * @return view of home
    */
    public function createCultivation(Request $request, $idUser)
    {
        $validator = Validator::make($request->all(),[
            'cantidad_de_hectareas' => 'required|numeric|integer|positive',
        ]);
        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator,'cultivation')->with('data',['cantidad_de_hectareas'=>$request->input('cantidad_de_hectareas'),'seleccionado'=>$request->input('seleccionado')]);
        }

        $cultivation = new Cultivation();
        $cultivation->hectare = $request->input('cantidad_de_hectareas');
        $cultivation->id_user = $idUser;
        $cultivation->id_product = $request->input('seleccionado');
        $user = User::find($idUser);
        try {
            $cultivation->save();
            $user->cultivation = $cultivation->id;
            $user->save();
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return  redirect()->route('home')->with('status-danger-cultivation','El servicio no se guardo por causa de un error: '.$e);
        }
        return redirect()->route('home')->with('status-success-cultivation','Se creo exitosamente la cultivación identicado como el N° '.$cultivation->id.".");
    }

    /**
    * @return view of home
    */
    public function createProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:45',
            'dias_de_cosecha' => 'required|numeric|integer|positive',
            'precio' =>'required|numeric|positive',
            'numero_de_arboles_promedio' => 'required|numeric|positive'
        ]);
        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator,'product')->with('data',['nombre'=>$request->input('nombre'),'dias_de_cosecha'=>$request->input('dias_de_cosecha'),'precio'=>$request->input('precio'),'numero_de_arboles_promedio'=>$request->input('numero_de_arboles_promedio')]);
        }

        $product = new product();
        $product->name_product = $request->input('nombre');
        $product->day_harvest = $request->input('dias_de_cosecha');
        $product->price= $request->input('precio');
        $product->n_tree= $request->input('numero_de_arboles_promedio');
        try {
            $product->save();
        } catch (Exception $e) {
            //Log::error($e->getMessage());
            return  redirect()->route('home')->with('status-danger-product','No se guardo por causa de un error: '.$e);
        }
        return redirect()->route('home')->with('status-success-product','Se creo exitosamente.');
    }
}
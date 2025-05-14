<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Costo;
use App\Utils\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado(Request $request)
    {

        $categorias = Categoria::all();

        return view('costo.listado')->with(compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ajaxListado(Request $request)
    {
        if($request->ajax()){

            $costos = Costo::all();
            $valores = [
                'listado' => view('costo.ajaxListado')->with(compact('costos'))->render()
            ];
            $data = Respuesta::success($valores, "Datos obtenidos correctamente");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        if($request->ajax()){

            $costo_id     = $request->input('costo_id');
            $categoria_id = $request->input('categoria_id');
            $valor        = $request->input('valor');
            $descripcion  = $request->input('descripcion');
            $usuario      = Auth::user();

            if($costo_id == "0"){
                $costo                     = new Costo();
                $costo->usuario_creador_id = $usuario->id;
            }else{
                $costo                         = Costo::find($costo_id);
                $costo->usuario_modificador_id = $usuario->id;
            }

            $costo->categoria_id    = $categoria_id;
            $costo->valor = $valor;
            $costo->descripcion = $descripcion;
            $costo->save();

            $data = Respuesta::success(null, "Registro exitoso");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Costo $costo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costo $costo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costo $costo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costo $costo)
    {
        //
    }
}

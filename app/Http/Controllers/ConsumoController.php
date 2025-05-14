<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Consumo;
use App\Utils\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado(Request $request)
    {
        $categorias = Categoria::all();

        return view('consumo.listado')->with(compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ajaxListado(Request $request)
    {
        if($request->ajax()){

            $consumos = Consumo::all();
            $valores = [
                'listado' => view('consumo.ajaxListado')->with(compact('consumos'))->render()
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

            $consumo_id     = $request->input('consumo_id');
            $categoria_id = $request->input('categoria_id');
            $valor        = $request->input('valor');
            $descripcion  = $request->input('descripcion');
            $usuario      = Auth::user();

            if($consumo_id == "0"){
                $consumo                     = new Consumo();
                $consumo->usuario_creador_id = $usuario->id;
            }else{
                $consumo                         = Consumo::find($consumo_id);
                $consumo->usuario_modificador_id = $usuario->id;
            }

            $consumo->categoria_id = $categoria_id;
            $consumo->valor        = $valor;
            $consumo->descripcion  = $descripcion;
            $consumo->save();

            $data = Respuesta::success(null, "Registro exitoso");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumo $consumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumo $consumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumo $consumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumo $consumo)
    {
        //
    }
}

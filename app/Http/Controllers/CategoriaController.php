<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Utils\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado(Request $request)
    {
        return view('categoria.listado');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ajaxListado(Request $request)
    {
        if($request->ajax()){

            $categorias = Categoria::all();

            $valores = [
                'listado' => view('categoria.ajaxListado')->with(compact('categorias'))->render()
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

            $categoria_id = $request->input('categoria_id');
            $nombre       = $request->input('nombre');
            $usuario      = Auth::user();

            if($categoria_id == "0"){
                $categoria                     = new Categoria();
                $categoria->usuario_creador_id = $usuario->id;
            }else{
                $categoria                         = Categoria::find($categoria_id);
                $categoria->usuario_modificador_id = $usuario->id;
            }

            $categoria->nombre    = $nombre;
            $categoria->save();

            $data = Respuesta::success(null, "Registro exitoso");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}

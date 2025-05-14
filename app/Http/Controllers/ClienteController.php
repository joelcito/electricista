<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Medidor;
use App\Utils\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado(Request $request)
    {
        return view('cliente.listado');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function guardar(Request $request)
    {
        if($request->ajax()){

            $cliente_id = $request->input('cliente_id');
            $nombre     = $request->input('nombre');
            $ap_paterno = $request->input('ap_paterno');
            $ap_materno = $request->input('ap_materno');
            $cedula     = $request->input('cedula');
            $direccion  = $request->input('direccion');
            $celular    = $request->input('celular');
            $correo     = $request->input('correo');
            $usuario    = Auth::user();

            if($cliente_id == "0"){
                $cliente                     = new Cliente();
                $cliente->usuario_creador_id = $usuario->id;
            }else{
                $cliente                         = Cliente::find($cliente_id);
                $cliente->usuario_modificador_id = $usuario->id;
            }

            $cliente->nombres    = $nombre;
            $cliente->ap_paterno = $ap_paterno;
            $cliente->ap_materno = $ap_materno;
            $cliente->cedula     = $cedula;
            $cliente->direccion  = $direccion;
            $cliente->celular    = $celular;
            $cliente->correo     = $correo;
            $cliente->save();

            $data = Respuesta::success(null, "Registro exitoso");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    public function ajaxListado(Request $request)
    {
        if($request->ajax()){

            $clientes = Cliente::all();
            $valores = [
                'listado' => view('cliente.ajaxListado')->with(compact('clientes'))->render()
            ];
            $data = Respuesta::success($valores, "Datos obtenidos correctamente");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    public function ajaxMedidores(Request $request)
    {
        if($request->ajax()){

            $cliente_id = $request->input('cliente_id');

            $medidores = Medidor::where('cliente_id',$cliente_id)->get();

            $valores = [
                'listado' => view('cliente.ajaxMedidores')->with(compact('medidores', 'cliente_id'))->render()
            ];
            $data = Respuesta::success($valores, "Datos obtenidos correctamente");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }

        return $data;
    }

    public function guardarMedidor(Request $request)
    {
        if($request->ajax()){

            $cliente_id     = $request->input('medidor_cliente_id');
            $numero_medidor = $request->input('numero_medidor');
            $usuario        = Auth::user();

            $medidor                     = new Medidor();
            $medidor->usuario_creador_id = $usuario->id;
            $medidor->cliente_id         = $cliente_id;
            $medidor->numero             = $numero_medidor;
            $medidor->save();

            $medidores = Medidor::where('cliente_id',$cliente_id)->get();

            $valores = [
                'listado' => view('cliente.ajaxMedidores')->with(compact('medidores', 'cliente_id'))->render()
            ];
            $data = Respuesta::success($valores, "Datos obtenidos correctamente");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}

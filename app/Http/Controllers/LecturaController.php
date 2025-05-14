<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use App\Models\Medidor;
use App\Utils\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utils\Util;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado()
    {
        return view('lectura.listado');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function guardaLectura(Request $request)
    {
        if($request->ajax()){

            $fecha      = $request->input('fecha_consumo');
            $medidor_id = $request->input('medidor_id_consumo');
            $consumo    = $request->input('consumo_consumo');
            $usuario    = Auth::user();
            $utiles     = app(Util::class);

            // SACAMOS EL ULTIMO REGISTRADO DE LA LESCTURA
            $lecturaAnterior = Lectura::where('medidor_id', $medidor_id)->orderBy('id', 'desc')->first();

            if($lecturaAnterior){
                $monto_anterior = $lecturaAnterior['consumo'];
            }else{
                $monto_anterior = 0;
            }

            $lectura                     = new Lectura();
            $lectura->usuario_creador_id = $usuario->id;
            $lectura->medidor_id         = $medidor_id;
            $lectura->fecha              = $fecha;
            $lectura->consumo            = (float)$consumo;
            $lectura->consumo_diferencia = ((float)$consumo - (float)$monto_anterior);
            $lectura->periodo            = $utiles->getMesLiteral($fecha);
            $lectura->gestion            = $utiles->getAnio($fecha);
            $lectura->save();

            $lecturas = Lectura::where('medidor_id', $medidor_id)->get();
            $medidor  = Medidor::find($medidor_id);
            $valores = [
                'listado' => view('lectura.ajaxListado')->with(compact('lecturas', 'medidor'))->render()
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
    public function ajaxListado(Request $request)
    {
        if($request->ajax()){

            $medidor_id = $request->input('medidor_id');

            $lecturas = Lectura::where('medidor_id', $medidor_id)->get();
            $medidor  = Medidor::find($medidor_id);

            $valores = [
                'listado' => view('lectura.ajaxListado')->with(compact('lecturas', 'medidor'))->render()
            ];
            $data = Respuesta::success($valores, "Datos obtenidos correctamente");

        }else{
            $data = Respuesta::error(null, "Error al obtener los datos");
        }
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Lectura $lectura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lectura $lectura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lectura $lectura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lectura $lectura)
    {
        //
    }
}

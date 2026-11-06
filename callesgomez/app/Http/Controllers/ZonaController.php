<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    //
    public function obtenerZonas(){
        $zona = new Zona();

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores = [];

        $valores = $zona::all();

        if(!empty($valores))
        {
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "VAlores encontrados";
            $errores = [
                "code" => 200,
                "msg" => ""
            ];
        }
        else
        {
            $satisfactorio = false;
            $estado = 400;
            $mensaje = "No se han encontrado valores";
            $errores = [
                "code" => 404,
                "msg" => ""
            ]; 
        }

        $respuesta = [
            "succes" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "errores" => $errores,
            "total" => sizeof($valores)
        ];

        return response()->json($respuesta);
    }
}

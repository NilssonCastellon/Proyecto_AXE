<?php

namespace App\Http\Controllers\AXE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class personasController extends Controller
{
    public function personas(){
       $personas = Http::get('http://localhost:3000/personas');
       $citaArreglo = json_decode($personas,true);
       //return $reservaciones;
       return view('AXE.personas', compact('citaArreglo'));
       
    }
   /* // de aqui
    public function del($cod){
        $del = Http::delete('http://localhost:3000/del/'.$cod);
        return redirect('/ControlM');
    }
    // hasta aqui*/

    public function nueva_persona(Request $request ){
        //print_r([$request->input("nombre"),$request->input("fecha"),$request->input("registro"),$request->input("codigo")]);die();
        $nueva_persona = Http::post('http://localhost:3000/nueva_persona',[
    "NOMBRE" => $request->input("NOMBRE"),
    "APELLIDO"=> $request->input("APELLIDO"),
    "IDENTIDAD"=> $request->input("IDENTIDAD"),
    "GENERO"=> $request->input("GENERO"),
    "TIPO_PERSONA"=> $request->input("TIPO_PERSONA"),
    "FECHA_NACIMIENTO"=> $request->input("FECHA_NACIMIENTO"),
    "FECHA_SALIDA "=> $request->input("FECHA_SALIDA"),
    
        ]);
        return redirect('/personas');
    }

    public function modificar_persona(Request $request ){
        //print_r([$request->input("id"),$request->input("formato"),$request->input("servicios"),$request->input("tipo")]);die();
        $modificar_persona = Http::put('http://localhost:3000/modificar_persona/'.$request->input("COD_PERSONA"),[
    "COD_PERSONA"=> $request->input("COD_PERSONA"),
    "NOMBRE" => $request->input("NOMBRE"),
    "APELLIDO"=> $request->input("APELLIDO"),
    "IDENTIDAD"=> $request->input("IDENTIDAD"),
    "GENERO"=> $request->input("GENERO"),
    "TIPO_PERSONA"=> $request->input("TIPO_PERSONA"),
    "FECHA_NACIMIENTO"=> $request->input("FECHA_NACIMIENTO"),
    "FECHA_SALIDA "=> $request->input("FECHA_SALIDA"),

        ]);
       //print_r([$putformatos]);die();

        return redirect('/personas');
    }


}
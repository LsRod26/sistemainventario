<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\componentecpu;
use App\Models\componenteimpresora;
use App\Models\equipo;
use App\Models\tipo_componente;
use Illuminate\Http\Request;

class componentecontroller extends Controller
{
    public function create(){

        $tipocomponentes = tipo_componente::select('id','nombre')->get();
        //$listaequipos = equipo::select('id', 'nombre_equipo')->where('ACTIVO','=','0')->get();
        $listaequipos = equipo::select('id', 'nombre_equipo')->get();
        return view ('componentes.crear', compact('tipocomponentes','listaequipos'));
        
    }

    public function store(Request $request){

        $tipocomponente = tipo_componente::select('id')->where('nombre','=', $request->selecttipocomponente)->first();
        
        if($request->tarjeta_red == '1'){
            $ip = $request->ip;
            $mac = $request->mac;
        }else {
            $ip = null;
            $mac = null;
        };

        Componente::create([
            'id_tipo_componente'=>$tipocomponente->id,
            'id_equipo'=>$request->selectequipo,
            'codigo_componente' => $request->codigocomponente,
            'marca'=>strtoupper($request->marca),
            'serial'=>$request->serial,
            'ACTIVO'=>$request->selectestado,
            'tarjeta_red'=>$request->tarjeta_red,
            'ip'=>$ip,
            'mac'=>$mac,
        ]);

        
        $id = Componente::latest('created_at')->first();
        
        $comp = tipo_componente::select('nombre')->where('id','=',$id->id_tipo_componente)->first();

        if($comp->nombre == 'CPU'){
            componentecpu::create([
                'id_componenteCPU'=>$id->id,
                'procesador'=>strtoupper($request->procesador),
                'ram'=>$request->ram,
            ]);
        } elseif ($comp->nombre == 'IMPRESORA'){
            componenteimpresora::create([
                'id_componenteimpresora'=>$id->id,
                'COLOR'=>$request->IMPCOLOR,
            ]);
        } 
        return redirect()->route('componente.crear');
    }

    public function asignarequipo(){
        $tipocomponentes = tipo_componente::select('id','nombre')->get();

        $equipos = equipo::select('id', 'nombre_equipo')->get();

        return view('componentes.asignarequipo', compact('tipocomponentes', 'equipos'));

    }

    public function getcomponentes($id){
        $componentesarray = [];
        $componentes = Componente::select('id','codigo_componente')->where('id_tipo_componente',$id)->whereNull('id_equipo')->where('ACTIVO','=','0')->get();
        foreach ($componentes as $componente){
            $componentesarray[$componente->id]=$componente->codigo_componente;
        }
        return response()->json($componentesarray);
    }

    public function storeasignarequipo(Request $request){
        //BUSCO COMPONENTE A ACTUALIZAR
        $componente = Componente::find($request->componente);
        //REEMPLAZO CAMPO ID EQUIPO
        $componente->id_equipo = $request->equipo;

        $componente->save();

        return redirect()->route('asignar.funcionarioequipo');

    }

}

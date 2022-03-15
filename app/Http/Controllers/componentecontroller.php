<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\componentepc;
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
            'registradopor'=> auth()->user()->name,
        ]);

        
        $id = Componente::latest('created_at')->first();
        
        $comp = tipo_componente::select('nombre')->where('id','=',$id->id_tipo_componente)->first();

        if($comp->nombre == 'CPU'||'LAPTOP'||'ALLINONE'){
            componentepc::create([
                'id_componentepc'=>$id->id,
                'procesador'=>strtoupper($request->procesador),
                'ram'=>strtoupper($request->ram),
                'modelo'=>strtoupper($request->modelo),
                'discoduro'=>strtoupper($request->discoduro),
            ]);
        } elseif ($comp->nombre == 'IMPRESORA'){
            componenteimpresora::create([
                'id_componenteimpresora'=>$id->id,
                'COLOR'=>$request->IMPCOLOR,
            ]);
        } 
        return redirect()->route('componente.crear')->with('status', 'Componente registrado satisfactoriamente');
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

        return redirect()->route('asignar.funcionarioequipo')->with('status', 'Asignación registrada satisfactoriamente');

    }

    /*public function editar(Componente $componente){

        $tipocomponentes = tipo_componente::select('id','nombre')->get();
        $listaequipos = equipo::select('id', 'nombre_equipo')->get();
        //dd($componente);   //ME DEVUELVE EL ID DE TIPO_COMPONENTE 
        $tipocomponente =tipo_componente::select('nombre')->where('id','=',$componente->id_tipo_componente)->first();
        //dd($tipocomponente); //DEVUELVE EL NOMBRE DEL TIPO DEL COMPONENTE
        dd($componente);
        if($tipocomponente->nombre == 'CPU'){
            $a = componentecpu::select('procesador','ram')->where('id_componenteCPU','=',$componente->id)->first();
            //dd($a[0]);
        } elseif ($tipocomponente->nombre == 'IMPRESORA'){
            $a = componenteimpresora::select('COLOR')->where('id_componenteimpresora','=',$componente->id)->first();
        }
        //dd($a);
        return view('componentes.edit',[
            'componente'=> $componente,
            'tipocomponentes'=> $tipocomponentes,
            'listaequipos'=> $listaequipos,
            'a'=>$a,
        ]);
        
    }*/

    public function editar(Componente $componente){
        $tipocomponentes = tipo_componente::select('id','nombre')->get();
        $listaequipos = equipo::select('id', 'nombre_equipo')->get();

        //SE OBTIENE EL ID DEL TIPO COMPONENTE
        //dd($componente);

        $a = tipo_componente::select('nombre')->where('id','=',$componente->id_tipo_componente)->first();

        //dd($a);

        $datoscpu = "";
        $datosimpresora = "";

        if($a->nombre == 'CPU'){
            $datoscpu = componentepc::select('procesador','ram')->where('id_componentepc','=',$componente->id)->first();
            /*return view('componentes.edit',[
                'componente'=> $componente,
                'tipocomponentes'=> $tipocomponentes,
                'listaequipos'=> $listaequipos,
                'datoscpu' => $datoscpu,
            ]);*/
        } elseif ($a->nombre == 'IMPRESORA'){
            $datosimpresora = componenteimpresora::select('COLOR')->where('id_componenteimpresora','=',$componente->id)->first();
            /*return view('componentes.edit',[
                'componente'=> $componente,
                'tipocomponentes'=> $tipocomponentes,
                'listaequipos'=> $listaequipos,
                'datosimpresora' => $datosimpresora,
            ]);*/
        } 
        return view('componentes.edit',[
            'componente'=> $componente,
            'tipocomponentes'=> $tipocomponentes,
            'listaequipos'=> $listaequipos,
            'datoscpu' => $datoscpu,
            'datosimpresora'=>$datosimpresora,
            'a'=>$a,
        ]);

    }

    public function update(Componente $componente){

        //$tipocomponente = tipo_componente::select('id')->where('nombre','=', $componente->selecttipocomponente)->first();

        //dd($componente);

        
        
        $componente->update([
            'codigo_componente'=>request('codigocomponente'),
            'id_tipo_componente'=>request('selecttipocomponente'),
            'id_equipo'=>request('selectequipo'),
            'marca'=>request('marca'),
            'serial'=>request('serial'),
            'tarjeta_red'=>request('tarjeta_red'),
            'ip'=>request('ip'),
            'mac'=>request('mac'),
            'actualizadopor'=> auth()->user()->name,
        ]);

        $a = tipo_componente::select('nombre')->where('id','=',$componente->id_tipo_componente)->first();

        //dd($a);
        //dd($componente);
    
        if($a->nombre == 'CPU'||'LAPTOP'||'ALLINONE'){
            $datoscpu = componentepc::where('id_componentepc','=',$componente->id);
            $datoscpu->update([
                'procesador'=>request('procesador'),
                'ram'=>request('ram'),
            ]);

        } elseif ($a->nombre == 'IMPRESORA'){
            $datosimp = componenteimpresora::where('id_componenteimpresora' , '=',$componente->id);
            $datosimp->update([
                'COLOR'=>request('IMPCOLOR'),
            ]);
        } 
        return redirect()->route('buscar')->with('status', 'Actualización registrada satisfactoriamente');

    }

}

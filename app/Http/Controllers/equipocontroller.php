<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\equipo;
use Illuminate\Http\Request;

class equipocontroller extends Controller
{
    public function create(){
        return view ('equipo.crear');
    }

    public function store(Request $request){
       
        if ($request->equipopersonal == 'INSTITUCIONAL') {
            equipo::create([
                'nombre_equipo'=>$request->nombreequipo,
                'tipo'=>$request->tipoequipo,
                'tipo_conexion'=>$request->tipoconexion,
                'ACTIVO'=>0,
                'registradopor'=> auth()->user()->name,
    
            ]);
            return redirect()->route('equipo.crear')->with('status', 'Equipo registrado satisfactoriamente');
        } else{
            equipo::create([
                'nombre_equipo'=>'PERSONAL- '.$request->nombreequipo,
                'tipo'=>$request->tipoequipo,
                'tipo_conexion'=>$request->tipoconexion,
                'ACTIVO'=>0,
                'registradopor'=> auth()->user()->name,
            ]);

            $equipocreado = equipo::select('id')->latest()->first();

            Componente::create([
            'id_equipo'=>$equipocreado->id,
            'marca'=>strtoupper($request->marca),
            'ip'=>$request->ip,
            'registradopor'=> auth()->user()->name,
            ]);
            return redirect()->route('equipo.crear')->with('status', 'Equipo registrado satisfactoriamente');

        }

        
    }


    public function editar(equipo $equipo){
        return view('equipo.edit',compact('equipo')); 
    }

    public function update(equipo $equipo){
        $equipo->update([
            'nombre_equipo'=> request('nombreequipo'),
            'tipo'=> request('tipoequipo'),
            'tipo_conexion'=> request('tipoconexion'),
            'ACTIVO'=> 1,
            'actualizadopor'=> auth()->user()->name,

        ]);
        return redirect()->route('buscar')->with('status', 'Actualización registrada satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use Illuminate\Http\Request;

class equipocontroller extends Controller
{
    public function create(){
        return view ('equipo.crear');
    }

    public function store(Request $request){
       
        equipo::create([
            'nombre_equipo'=>$request->nombreequipo,
            'tipo'=>$request->tipoequipo,
            'tipo_conexion'=>$request->tipoconexion,
            'ACTIVO'=>0
        ]);
        return redirect()->route('equipo.crear');
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
        ]);
        return redirect()->route('buscar');
    }
}

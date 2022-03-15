<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDireccionRequest;
use App\Models\direccion;
use Illuminate\Http\Request;

class direccioncontroller extends Controller
{
    
    public function create()
    {
        //return view('direccion.crear');
        
        return view('direccion.crear');
    }

    public function store(Request $request)
    {
        direccion::create([
            'direccion' => $request->nombredireccion,
            'ACTIVO' => $request->estadodireccion,
            'registradopor' => auth()->user()->name,    
        ]);
        return redirect()->route('direccion.create')->with('status', 'Dirección registrada satisfactoriamente');
    }

    public function edit(direccion $direccion){
        return view('direccion.edit',[
            'direccion'=> $direccion,
        ]);
    }

    public function update(direccion $direccion){
        $direccion->update([
            'direccion'=> request('nombredireccion'),
            'ACTIVO'=>request('estadodireccion'),
            'actualizadopor'=> auth()->user()->name,
        ]);
        return redirect()->route('buscar')->with('status', 'Actualización registrada satisfactoriamente');
    }

   
}

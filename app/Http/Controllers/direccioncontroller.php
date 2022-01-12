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
            'ACTIVO' => $request->estadodireccion
        ]);
        return redirect()->route('direccion.create');
    }

   
}

<?php

namespace App\Http\Controllers;

use App\Models\tipo_componente;
use Illuminate\Http\Request;

class tipocomponentecontroller extends Controller
{
    public function create()
    {
        return view('tipocomponente.crear');
    }

    public function store(Request $request)
    {
        $request2=strtoupper($request->nombretipocomponente);
        tipo_componente::create([
            'nombre'=>$request2,
            'registradopor'=> auth()->user()->name,
        ]);

        return redirect()->route('tipocomponente.crear');
    }
}

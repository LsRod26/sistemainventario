<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\direccion;
use App\Models\equipo;
use App\Models\funcionario;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class buscarcontroller extends Controller
{
    
    public function index(Request $request){
        
            $tfuncionarios = funcionario::all();
            $tcomponentes = Componente::all();
            $tequipos = equipo::all();
            $tsistemas = Sistema::all();
            $tdirecciones = direccion::all();

        
        return view('buscar', compact('tfuncionarios','tequipos','tcomponentes','tsistemas','tdirecciones'));
        
    }

}

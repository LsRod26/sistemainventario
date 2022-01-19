<?php

namespace App\Http\Controllers;

use App\Models\funcionario;
use App\Models\funcionario_sistema;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sistemascontroller extends Controller
{
    public function mostrarsistemas(){
        $listasistemas = Sistema::select('id', 'nombre')->get();
        return view('funcionario.asignarsistema', compact('listasistemas'));
    }


    public function store(Request $request){
        
        $FS = funcionario::select('id')->where('cedula','=',$request->cedula)->first();
        
        funcionario_sistema::create([
            'id_funcionario'=>$FS->id,
            'id_sistema'=>$request->selectsistemas,
            'ACTIVO'=>$request->estadofuncionariosistema
        ]);
        return redirect()->route('asignar.funcionariosistema');
    
    }

    public function create(){
        return view('sistema.crear');
    }

    public function storesystem(Request $request){
        Sistema::create([
            'nombre'=>$request->nombresistema
        ]);
        return redirect()->route('sistema.create');
    }

    public function editar(Sistema $sistema){
        return view('sistema.edit',[
            'sistema'=>$sistema,
        ]);
    }

    public function update(Sistema $sistema){
        $sistema->update([
            'nombre'=> request('nombresistema'),
        ]);

        return redirect()->route('buscar');
    }
}

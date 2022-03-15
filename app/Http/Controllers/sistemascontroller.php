<?php

namespace App\Http\Controllers;

use App\Models\funcionario;
use App\Models\funcionario_sistema;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sistemascontroller extends Controller
{
    //FUNCIONARIO-SISTEMA
    public function mostrarsistemas(){
        $listasistemas = Sistema::select('id', 'nombre')->get();
        $funcionarios = funcionario::select('id','nombres')->get();
        return view('funcionario.asignarsistema', compact('listasistemas','funcionarios'));
    }

    
    public function store(Request $request){
        
        //$FS = funcionario::select('id')->where('cedula','=',$request->cedula)->first();
        

        funcionario_sistema::create([
            'id_funcionario'=>$request->funcionario,
            'id_sistema'=>$request->sistemas,
            'ACTIVO'=>$request->estadofuncionariosistema,
            'registradopor'=> auth()->user()->name,
        ]);
        return redirect()->route('asignar.funcionariosistema')->with('status', 'Asignación registrada satisfactoriamente');
        //return back()->with('status','Sistema Registrado correctamente');
    
    }

    //SISTEMA
    public function create(){
        return view('sistema.crear');
    }

    public function storesystem(Request $request){
        Sistema::create([
            'nombre'=>$request->nombresistema,
            'registradopor'=> auth()->user()->name,
        ]);
        return redirect()->route('sistema.create')->with('status', 'Sistema registrada satisfactoriamente');
    }

    public function editar(Sistema $sistema){
        return view('sistema.edit',[
            'sistema'=>$sistema,
        ]);
    }

    public function update(Sistema $sistema){
        $sistema->update([
            'nombre'=> request('nombresistema'),
            'actualizadopor'=> auth()->user()->name,
        ]);

        return redirect()->route('buscar')->with('status', 'Actualización realizada satisfactoriamente');
    }
}

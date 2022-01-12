<?php

namespace App\Http\Controllers;

use App\Models\direccion;
use App\Models\equipo;
use App\Models\funcionario;
use App\Models\funcionario_equipo;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class funcionariocontroller extends Controller
{
    
    public function create()
    {
        $listadirecciones = direccion::select('id','direccion')->get();
        return view('funcionario.crear', compact('listadirecciones'));

        //return view('funcionario.crear');
    }

    public function store(Request $request)
    {
        funcionario::create([
            'id_direccion'=>$request->selectdireccion,
            'cedula'=>$request->cedula,
            'nombres'=>$request->nombresfuncionario,
            'cargo'=>$request->cargo,
            'perfil_navegacion'=>$request->perfilnavegacion,
            'ACTIVO'=>$request->estadofuncionario,
        ]);
        return redirect()->route('funcionario.create');
    }

    public function asignarequipo(Request $request){
        $listadirecciones = direccion::select('id','direccion')->get();
        
        $listaequipos = equipo::select('id','nombre_equipo')->where('ACTIVO','=','0')->get();
        return view('funcionario.asignarequipo', compact('listadirecciones','listaequipos'));
    }

    public function getfuncionarios($id){
        
        $funcionarioarray=[];
        $funcionarios = funcionario::where('id_direccion', $id)->get();
        foreach ($funcionarios as $funcionario){
            $funcionarioarray[$funcionario->id] = $funcionario->nombres;
        }
        //$funcionarioarray["success"]=true;
        return response()->json($funcionarioarray);
        
    }

    public function storefuncionarioequipo(Request $request){
        
        $equipo = equipo::find($request->selectequipos);
        $equipo->ACTIVO = 1;
        $equipo->save();
        
        funcionario_equipo::create([
            'id_funcionario'=>$request->selectfuncionario,
            'id_equipo'=>$request->selectequipos,
            'ACTIVO'=>$request->selectestado,
        ]);

        return redirect()->route('asignar.funcionarioequipo');

        
    }

    

}

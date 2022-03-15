<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\componenteimpresora;
use App\Models\componentepc;
use App\Models\direccion;
use App\Models\equipo;
use App\Models\funcionario;
use App\Models\funcionario_equipo;
use App\Models\funcionario_sistema;
use App\Models\Sistema;
use App\Models\tipo_componente;
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
            'registradopor'=> auth()->user()->name,
        ]);
        return redirect()->route('funcionario.create')->with('status', 'Funcionario registrado satisfactoriamente');
    }

    public function asignarequipo(Request $request){
        $listadirecciones = direccion::select('id','direccion')->get();
        
        $listaequipos = equipo::select('id','nombre_equipo')->where('ACTIVO','=','0')->get();
        //$listaequipos = equipo::select('id','nombre_equipo')->get();
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
            'registradopor'=> auth()->user()->name,
        ]);

        return redirect()->route('asignar.funcionarioequipo')->with('status', 'Asignación registrada satisfactoriamente');

        
    }

    public function editar(funcionario $funcionario){
        $listadirecciones = direccion::select('id','direccion')->get();
        $equipo = funcionario_equipo::select('id_equipo')->where('id_funcionario', $funcionario->id)->first();
        $nombreequipo = equipo::select('nombre_equipo')->where('id', $equipo->id_equipo)->first();
        //dd($equipo);
        //dd($nombreequipo);
        $listaequipos = equipo::select('id','nombre_equipo')->where('ACTIVO','=','0')->get();
        //dd($listaequipos);
        return view('funcionario.edit',[
            'funcionario'=> $funcionario,
            'listadirecciones'=> $listadirecciones,
            'equipo'=>$equipo,
            'nombreequipo'=>$nombreequipo,
            'listaequipos' => $listaequipos,
        ]);
    }

    public function update(funcionario $funcionario, Request $request){
        $equipo = funcionario_equipo::select('id_equipo')->where('id_funcionario', $funcionario->id)->first();
        //$equipo = funcionario_equipo::select('id')->where('id_funcionario',$funcionario->id)->first();
        
        // dd($equipo);
        //BUSCAR LA ASIGNACION DE ACUERDO AL ID DEL EQUIPO Y ACTUALIZAR SU ESTADO A 0
        
        //CAMBIAMOS EL EQUIPO ACTIVO DE 1 A 0
        $equipoQ = equipo::find($equipo)->first();
        $equipoQ->ACTIVO = 0;
        $equipoQ->save();

        $equipo2 = funcionario_equipo::select('id')->where('id_funcionario', $funcionario->id)->first();
        //CAMBIAR EL ACTIVO DE 1 A 0 DE LA ASIGNACION
        $equipoW = funcionario_equipo::find($equipo2)->first();
        $equipoW->ACTIVO = 0;
        $equipoW->actualizadopor = auth()->user()->name;
        $equipoW->save();

        //dd($request->equipos);
        //dd($funcionario);


        $funcionario->update([
            'id_direccion'=> request('selectdireccion'),
            'cedula'=> request('cedula'),
            'nombres'=> request('nombresfuncionario'),
            'cargo'=> request('cargo'),
            'perfil_navegacion'=> request('perfilnavegacion'),
            'ACTIVO'=> request('estadofuncionario'),
            'actualizadopor'=> auth()->user()->name,

        ]);
        return redirect()->route('buscar')->with('status', 'Actualización registrada satisfactoriamente');
    }
    
    //METODO PARA DETALLES
    public function detalles(funcionario $funcionario){
        //OBTENGO REGISTRO DE LOS SISTEMAS ASIGNADOS AL ID DEL FUNCIONARIO
        $sistemasid = funcionario_sistema::select('id_sistema')->where('id_funcionario', $funcionario->id)->get();

        foreach($sistemasid as $aux){
            //CREAR ARRAY, INSERTAR NOMBRES DE ACUERDO A LA CONSULTA DEL ID
            //array_push($sistemasarray, Sistema::select('nombre')->where('id', $aux->id_sistema)->first()->nombre);

            //AGREGAR ATRIBUTO NOMBRE ----- EN POSICION, ASIGNO NOMBRE DE ACUERDO AL ID. ACCEDO AL NOMBRE PARA UNA SOLA LISTA (ID- NOMBRE SISTEMA)
            $aux->nombre = Sistema::select('nombre')->where('id', $aux->id_sistema)->first()->nombre;
            
        }

        $equipo = funcionario_equipo::select('id_equipo')->where('id_funcionario', $funcionario->id)->where('ACTIVO','=','1')->first();
        //dd($equipo);
        
        if(empty($equipo)){
            //echo 'SIN EQUIPO';
            return view('detalles', compact('funcionario', 'sistemasid'));

        }else{

        

        $equipofuncionario = equipo::select('nombre_equipo','tipo','tipo_conexion')->where('id',$equipo->id_equipo)->first();
        //dd($equipofuncionario);


        $equipoF = equipo::select('id')->where('id',$funcionario->id)->first();

        //dd($equipoF);

        $componentes = Componente::select('id','id_tipo_componente','codigo_componente','marca','serial','ip')->where('id_equipo', $equipoF->id)->get();
        

        $imp = tipo_componente::select('id')->where('nombre', '=','IMPRESORA')->first()->id;

        foreach($componentes as $comp){
            if ($comp->ip != NULL){
                if ($comp->id_tipo_componente == $imp) {
                    $comp->detalle = componenteimpresora::select('*')->where('id_componenteimpresora',$comp->id)->first();
                } else {
                    $comp->detalle = componentepc::select('*')->where('id_componentepc',$comp->id)->first();
                }
            }
        }
        foreach($componentes as $omp){
            $omp->tipocomponente = tipo_componente::select('nombre')->where('id',$omp->id_tipo_componente)->first()->nombre;
        }
    }   
        
        //dd($componentes);

        return view('detalles', compact('funcionario', 'sistemasid', 'equipofuncionario','componentes','imp'));
    }

    

}

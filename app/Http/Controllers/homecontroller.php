<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\equipo;
use App\Models\Sistema;
use App\Models\tipo_componente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //HACER EL FOR EACH PARA CADA COMPONENTE
        $sistema1 = tipo_componente::select('id','nombre')->get();
        $sistema = Componente::select('id_tipo_componente', DB::raw('COUNT(*) as "ComponentesRegistrados"'))->groupBy('id_tipo_componente')->get();
        
        foreach($sistema1 as $item){
            foreach($sistema as $item2){
                if($item->id == $item2->id_tipo_componente){
                    $item-> cantidad = $item2->ComponentesRegistrados;
                    break;
                } else {
                    $item-> cantidad = 0;
                }
            }
        } 

        $equipos = DB::table('equipo')->count();

        $funcionarios = DB::table('funcionario')->count();

        $sistemas = DB::table('sistema')->count();

        $direcciones = DB::table('direccion')->count();
        
        return view('home', compact('sistema1','equipos','funcionarios','sistemas','direcciones'));
    }


}

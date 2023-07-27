<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\DatosClientes;



class vistasController extends Controller
{
	public function mostrarInicio(){

        $total = DatosClientes::count();
        $eliminados = DatosClientes::onlyTrashed()->count();
        $registros = DatosClientes::all();
		return view('welcome', compact('registros','total', 'eliminados'));


	}

    public function mostrarFormulario(){
        return view('formulario');
    }
	

    public function mostrarDetalles($id){

        $datos = DatosClientes::find($id);

        return view('detalles', compact('datos'));

    }

}

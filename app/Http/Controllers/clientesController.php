<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\DatosClientes;

class clientesController extends Controller
{
    public function agregarCliente(Request $req){

        $validator = Validator::make($req->all(), [
            'nombre' => 'required|string|regex:/^[\p{L} ]+$/u',
            'paterno' => 'required|string|regex:/^[\p{L} ]+$/u',
            'materno' => 'required|string|regex:/^[\p{L} ]+$/u',
            'domicilio' => 'required|string',
            'correo'=>'required|email'
        ]);

        if($validator->fails()){
            $response = ['status'=> 400, 'message' => "Por favor, complete los campos adecuadamente"];
        }else{


            $emailExiste = DatosClientes::where('correo_electronico', $req->correo)->first();

            if($emailExiste){
                $response = ['status'=> 400, 'message' => "El correo ya existe, ingrese algun otro"];
    
            }else{
                $insertar = DatosClientes::create([
                    'nombres' => $req->nombre,
                    'apellido_paterno' => $req->paterno,
                    'apellido_materno' => $req->materno,
                    'domicilio' => $req->domicilio,
                    'correo_electronico' => $req->correo,
                ]);

                $response = [
                    'status'=> 200, 
                    'message' => "Registro creado con exito"
                ];

               

            }

            
            
                
            

                
        }
      
        return response()->json($response);

    }



    public function eliminarCliente(Request $req){

        $id = $req->id;

        $eliminar = DatosClientes::find($id);

        if($eliminar){
            $eliminar->delete();
            $response = ['status'=> 200, 'message' => "Eliminado correctamente"];

        }else{
            $response = ['status'=> 400, 'message' => "No existe el registro"];
        }

        return response()->json($response);

    }


    public function editarCliente(Request $req){


        

        $validator = Validator::make($req->all(), [
            'nombre' => 'required|string|regex:/^[\p{L} ]+$/u',
            'paterno' => 'required|string|regex:/^[\p{L} ]+$/u',
            'materno' => 'required|string|regex:/^[\p{L} ]+$/u',
            'domicilio' => 'required|string',
            'correo'=>'required|email'
        ]);

        if($validator->fails()){
            $response = ['status'=> 400, 'message' => "Por favor, complete los campos adecuadamente"];
        }else{


            

                $id = $req->id;
                $cliente = DatosClientes::find($id);

                if($cliente){


                    $cliente->update([
                        'nombres' => $req->nombre,
                        'apellido_paterno' => $req->paterno,
                        'apellido_materno' => $req->materno,
                        'domicilio' => $req->domicilio,
                        'correo_electronico' => $req->correo,

                    ]);

                    $response = [
                        'status'=> 200, 
                        'message' => "Registro editado con exito"
                    ];
                }else{

                    $response = [
                        'status'=> 400, 
                        'message' => "No se encontro el registro a actualizar"
                    ];

                }


            
        }
        

        return response()->json($response);


    }
}

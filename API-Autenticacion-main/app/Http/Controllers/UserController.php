<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;
use App\Models\Persona;





class UserController extends Controller
{
    public function Register(Request $request){

        $validation = Validator::make($request->all(),[
            'priNomb' => 'required|max:32',
            'ci' => 'required|max:8|unique:personas',
            'segNomb' => 'max:32',
            'priApe' => 'required|max:32',
            'segApe' => 'max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails())
            return $validation->errors();

        $usuario = $this -> createUser($request);
        $idUsuario = $usuario -> id;
        
        return $this -> crearPersona($idUsuario, $request);
        

        
    }

    private function createUser($request){
        $user = new User();
        $user -> email = $request -> post("email");
        $user -> password = Hash::make($request -> post("password"));   
        $user -> save();
        return $user;
    }

    public function ValidateToken(Request $request){
        return auth('api')->user();
    }

    public function Logout(Request $request){
        $request->user()->token()->revoke();
        return ['message' => 'Token Revoked'];
        
        
    }

    private function crearPersona($idUsuario, $request){
        $persona = new Persona();
        $persona -> id = $idUsuario;
        $persona -> ci = $request -> post("ci");
        $persona -> pri_nomb = $request -> post("priNomb");
        $persona -> seg_nomb = $request -> post("segNomb");
        $persona -> pri_ape = $request -> post("priApe");
        $persona -> seg_ape = $request -> post("segApe");
        $persona -> save();
        return $persona;

    }


    
}

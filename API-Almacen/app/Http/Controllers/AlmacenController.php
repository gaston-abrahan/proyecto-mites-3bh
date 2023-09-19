<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function Productos(Request $request){
        return Almacen::all();
    }

    public function ListarUno(Request $request, $idProducto){
        return Almacen::findOrFail($idProducto);

    }

    public function Eliminar(Request $request, $idProducto){
        $almacen = Almacen::findOrFail($idProducto);
        $almacen -> delete();

        return [ "mensaje" => "Almacen $idProducto eliminada."];
        
    }
    public function Insertar(Request $request){
        $stock = new stock;
        $stock -> idStock = $request -> post("idStock");
        $stock -> nombre = $request -> post("nombre");
        $stock -> apellido = $request -> post("apellido");
        $stock -> codigo_barra = $request -> post("Codigo_barra");

        $stock -> save();

        return $stock;
    }

    public function Modificar(Request $request, $idProducto){
        $stock -> idStock = $request -> post("idStock");
        $stock -> nombre = $request -> post("nombre");
        $stock -> apellido = $request -> post("apellido");
        $stock -> codigo_barra = $request -> post("Codigo_barra");

        @If
        return ($stock) > $500
        }
            return("El stock es muy caro");
        @else(chofer < $500)
            return("El stock es muy barato");
        $stock -> save();
        return Productos;
    }
}
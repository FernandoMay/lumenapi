<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller{
    public function index() {
        $productos = Products::all();
        if(count($productos) > 0){
            return response()->json(['status' => 'OK', 'data' => $productos, 'mensaje' => 'Registros de productos'],200);
        }
        else{
            return response()->json(['status' => 'OK', 'data' => array(), 'mensaje' => 'Sin registros de productos'],200);
        }
    }

    public function getProduct($id) {
        $producto = Products::find($id);
        if($producto){
            return response()->json(['status' => 'OK', 'data' => $producto, 'mensaje' => 'Registro de producto'],200);
        }
        else{
            return response()->json(['status' => 'OK', 'data' => array(), 'mensaje' => 'No existe registro de ese producto'],200);
        }
    }

    public function createProduct(Request $request){
        $producto = new Products;
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        if($producto){
            return response()->json(['status' => 'OK', 'data' => $producto, 'mensaje' => 'Registro guardado'],200);
        }
        else{
            return response()->json(['status' => 'OK', 'data' => array(), 'mensaje' => 'No se registro el producto'],200);
        }
    }

    public function updateProduct(Request $request,$id){
        $producto = Products::find($id);
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        if($producto){
            return response()->json(['status' => 'OK', 'data' => $producto, 'mensaje' => 'Producto actualizado'],200);
        }
        else{
            return response()->json(['status' => 'OK', 'data' => array(), 'mensaje' => 'No se actualizo el producto'],200);
        }
    }

    public function deleteProduct($id){
        $producto = Products::find($id);
        $producto->save();
        if($producto){
            return response()->json(['status' => 'OK', 'data' => $producto, 'mensaje' => 'Registro eliminado'],200);
        }
        else{
            return response()->json(['status' => 'OK', 'data' => array(), 'mensaje' => 'No se elimino el producto'],200);
        }
    }
}

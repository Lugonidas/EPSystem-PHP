<?php

namespace Model;

use Model\ActiveRecord;
use Model\Producto;

class Venta extends ActiveRecord
{



    public function __construct($args = [])
    {
    }

    public function agregarCarrito($id)
    {

        $producto = Producto::find($id);

        $carrito = [];

        if ($producto) {
            $carrito = [
                "id" => $producto->id,
                "nombre" => $producto->nombre
            ];
        }

        debuguear($carrito);
    }
}
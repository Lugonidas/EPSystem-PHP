<?php

namespace Controllers;

use Model\Cliente;
use Model\Producto;
use Model\Venta;
use Model\Usuario;
use MVC\Router;

class VentaController
{
    public static function index(Router $router)
    {

        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("ventas/ventas", [
            "titulo" => "Ventas",
            "usuarioId" => $usuarioId
        ]);
    }

    public static function crearVenta(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);
        $clientes = Cliente::all();
        $alertas = [];
        
        $idProducto = '';
        
        if (!$_GET) {
            $alertas['error'][] = "Sin busquedas";
        } else {
            $idProducto = (int) $_GET['id'] ?? '';
            $idProducto = Producto::find($idProducto);
        }        
        if (!$idProducto) {
            $alertas['error'][] = "Producto no encontrado";
        }
        

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
        }

        $router->render("ventas/crear-venta", [
            "titulo" => "Crear Venta",
            "usuarioId" => $usuarioId,
            "clientes" => $clientes,
            "alertas" => $alertas,
            "idProducto" => $idProducto
        ]);
    }
}

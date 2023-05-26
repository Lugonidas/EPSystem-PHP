<?php

namespace Controllers;

use Model\Producto;
use Model\Usuario;
use Model\Cliente;
use MVC\Router;

class DashboardController
{
    public static function index(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);
        $usuarios = Usuario::all();
        $productos = Producto::all();
        $clientes = Cliente::all();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
        }

        $router->render("dashboard/index", [
            "titulo" => "Dashboard",
            "nombre" => $_SESSION['nombre'],
            "usuarioId" => $usuarioId,
            "usuarios" => $usuarios,
            "productos" => $productos,
            "clientes" => $clientes
        ]);
    }
}

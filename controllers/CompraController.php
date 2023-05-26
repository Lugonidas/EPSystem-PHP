<?php

namespace Controllers;

use Model\Cliente;
use Model\Usuario;
use MVC\Router;
use Model\Rol;

class CompraController
{
    //Clientes
    public static function index(Router $router)
    {
        isAuth();
        $clientes = Cliente::all();
        $alertas = [];
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("compras/compras", [
            "titulo" => "Compras",
            "clientes" => $clientes,
            "usuarioId" => $usuarioId,
            "alertas" => $alertas
        ]);
    }
}

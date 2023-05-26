<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class ConfiguracionController
{

    public static function index(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("configuracion/config", [
            "titulo" => "Configuración",
            "usuarioId" => $usuarioId
        ]);
    }

    public static function reportes(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("reportes/reportes", [
            "titulo" => "Reportes",
            "usuarioId" => $usuarioId
        ]);
    }
}

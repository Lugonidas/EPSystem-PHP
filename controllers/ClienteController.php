<?php

namespace Controllers;

use Model\Cliente;
use Model\Usuario;
use MVC\Router;
use Model\Rol;

class ClienteController
{
    //Clientes
    public static function index(Router $router)
    {
        isAuth();
        $clientes = Cliente::all();
        $alertas = [];
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("clientes/clientes", [
            "titulo" => "Clientes",
            "clientes" => $clientes,
            "usuarioId" => $usuarioId,
            "alertas" => $alertas
        ]);
    }

    public static function crearCliente(Router $router)
    {
        isAuth();

        $usuarioId = Usuario::find($_SESSION['id']);
        $roles = Rol::all();

        $alertas = [];
        $cliente =  new Cliente;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $cliente->sincronizar($_POST);
            $alertas = $cliente->validar();

            if (empty($alertas)) {

                $resultado = $cliente->existeCliente();

                if ($resultado->num_rows) {
                    $alertas = Cliente::getAlertas();
                } else {

                    $resultado = $cliente->guardar();

                    if ($resultado) {
                        header("Location: /clientes");
                    }
                }
            }
        }

        $router->render("clientes/crear-cliente", [
            "titulo" => "Crear Cliente",
            "alertas" => $alertas,
            "cliente" => $cliente,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }

    public static function actualizarCliente(Router $router)
    {
        isAuth();

        if (!is_numeric(($_GET['id']))) return;

        $cliente = Cliente::find($_GET['id']);

        $usuarioId = Usuario::find($_SESSION['id']);

        $roles = Rol::all();

        //Alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $cliente->sincronizar($_POST);
            $alertas = $cliente->validar();

            //Verificar que alertas este vacio
            if (empty($alertas)) {
                $resultado = $cliente->guardar();
                if ($resultado) {
                    header("Location: /clientes");
                }
            }
        }

        $router->render("clientes/actualizar-cliente", [
            "titulo" => "Actualizar Cliente",
            "alertas" => $alertas,
            "cliente" => $cliente,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }

    public static function eliminarCliente()
    {
        isAuth();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $cliente = Cliente::find($id);
            $cliente->eliminar();
            header("Location: /clientes");
        }
    }
}

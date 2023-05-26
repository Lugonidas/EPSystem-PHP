<?php

namespace Controllers;

use Model\Proveedor;
use Model\Usuario;
use Model\Rol;
use MVC\Router;

class ProveedorController
{

    public static function index(Router $router)
    {


        $alertas = [];
        $proveedores = Proveedor::all();
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("proveedores/proveedores", [
            "titulo" => "Proveedores",
            "proveedores" => $proveedores,
            "alertas" => $alertas,
            "usuarioId" => $usuarioId
        ]);
    }

    public static function crearProveedor(Router $router)
    {
        isAuth();

        $proveedor = new Proveedor;
        $usuarioId = Usuario::find($_SESSION['id']);
        $roles = Rol::all();


        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $proveedor->sincronizar($_POST);

            $alertas = $proveedor->validar();

            if (empty($alertas)) {

                $resultado = $proveedor->existeProveedor();

                if ($resultado->num_rows) {
                    $alertas = Proveedor::getAlertas();
                } else {

                    $resultado = $proveedor->guardar();

                    if ($resultado) {
                        header("Location: /proveedores");
                    }
                }
            }
        }

        $router->render("proveedores/crear-proveedor", [
            "titulo" => "Crear Proveedor",
            "alertas" => $alertas,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }

    public static function actualizarProveedor(Router $router)
    {
        isAuth();

        if (!is_numeric(($_GET['id']))) return;

        $proveedor = Proveedor::find($_GET['id']);
        $usuarioId = Usuario::find($_SESSION['id']);
        $roles = Rol::all();

        //Alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $proveedor->sincronizar($_POST);
            $alertas = $proveedor->validar();

            //Verificar que alertas este vacio
            if (empty($alertas)) {
                $resultado = $proveedor->guardar();
                if ($resultado) {
                    header("Location: /proveedores");
                }
            }
        }

        $router->render("proveedores/actualizar-proveedor", [
            "titulo" => "Actualizar Proveedor",
            "alertas" => $alertas,
            "usuarioId" => $usuarioId,
            "proveedor" => $proveedor,
            "roles" => $roles
        ]);
    }


    public static function eliminarProveedor()
    {
        isAuth();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $proveedor = Proveedor::find($id);
            $proveedor->eliminar();
            header("Location: /proveedores");
        }
    }
}

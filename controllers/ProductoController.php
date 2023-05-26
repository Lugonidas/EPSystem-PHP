<?php

namespace Controllers;

use Model\Producto;
use Model\Unidad;
use Model\Usuario;
use Model\Rol;
use MVC\Router;

class ProductoController
{
    public static function index(Router $router)
    {
        isAuth();
        $productos = Producto::all();
        $usuarioId = Usuario::find($_SESSION['id']);

        $router->render("productos/productos", [
            "titulo" => "Productos",
            "productos" => $productos,
            "usuarioId" => $usuarioId
        ]);
    }

    public static function crearProducto(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);
        $producto = new Producto;
        $unidades = Unidad::all();
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $producto->sincronizar($_POST);
            $alertas = $producto->validarNuevoProducto();

            if (empty($alertas)) {
                $resultado = $producto->guardar();

                if ($resultado) {
                    header("Location: /productos");
                }
            }
        }

        $router->render("productos/crear-producto", [
            "titulo" => "Crear Producto",
            "unidades" => $unidades,
            "producto" => $producto,
            "alertas" => $alertas,
            "usuarioId" => $usuarioId
        ]);
    }

    public static function actualizarProducto(Router $router)
    {
        isAuth();
        
        if (!is_numeric(($_GET['id']))) return;
        
        $producto = Producto::find($_GET['id']);
        $unidades = Unidad::all();
        $usuarioId = Usuario::find($_SESSION['id']);
        $roles = Rol::all();

        //Alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $producto->sincronizar($_POST);
            $alertas = $producto->validar();

            //Verificar que alertas este vacio
            if (empty($alertas)) {
                $resultado = $producto->guardar();
                if ($resultado) {
                    header("Location: /productos");
                }
            }
        }

        $router->render("productos/actualizar-producto", [
            "titulo" => "Actualizar Producto",
            "alertas" => $alertas,
            "usuarioId" => $usuarioId,
            "producto" => $producto,
            "roles" => $roles,
            "unidades" => $unidades
        ]);
    }
    public static function eliminarProducto()
    {
        isAuth();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $producto = Producto::find($id);
            $producto->eliminar();
            header("Location: /productos");
        }
    }
}

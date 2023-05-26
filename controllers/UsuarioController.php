<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use Model\Rol;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class UsuarioController
{
    public static function index(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);
        $usuarios = Usuario::all();

        $router->render('usuarios/usuarios', [
            "titulo" => "Usuarios",
            "usuarios" => $usuarios,
            "usuarioId" => $usuarioId
        ]);
    }

    public static function crearUsuario(Router $router)
    {
        isAuth();
        $usuarioId = Usuario::find($_SESSION['id']);
        $usuario = new Usuario;
        $roles = Rol::all();

        //Alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $usuario->sincronizar($_POST);

            //Generar nombre unico para las imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Realiza un resize a la imagen con Intervention
            if ($_FILES['imagen']['tmp_name']) {
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
                $usuario->setImagen($nombreImagen);
            }

            $alertas = $usuario->validarNuevoUsuario();

            //Verificar que alertas este vacio
            if (empty($alertas)) {

                //Crear carperta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                //Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear el password
                    $usuario->hashPassword();

                    //Crear token
                    $usuario->crearToken();

                    //Enviar confirmacion
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    //Crear al usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header("Location: /usuarios");
                    }
                }
            }
        }

        $router->render('usuarios/crear-usuario', [
            "titulo" => "Crear Usuario",
            "alertas" => $alertas,
            "usuario" => $usuario,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }

    public static function eliminarUsuario()
    {
        isAuth();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $usuario = Usuario::find($id);
            $usuario->eliminar();
            header("Location: /usuarios");
        }
    }

    public static function actualizarUsuario(Router $router)
    {
        isAuth();

        if (!is_numeric(($_GET['id']))) return;

        $usuarioId = Usuario::find($_GET['id']);
        $usuario = new Usuario;

        $roles = Rol::all();

        //Alertas vacias
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->actualizarUsuario();

            //Verificar que alertas este vacio
            if (empty($alertas)) {
                $resultado = $usuario->guardar();
                if ($resultado) {
                    header("Location: /usuarios");
                }
            }
        }

        $router->render('usuarios/actualizar-usuario', [
            "titulo" => "Actualizar Usuario",
            "alertas" => $alertas,
            "usuario" => $usuario,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }


    public static function confirmar(Router $router)
    {
        isAuth();

        $alertas = [];

        $token = s($_GET["token"]);

        //Buscar usuario por token
        $usuario = Usuario::where("token", $token);

        $router->render('usuarios/confirmar', [
            "titulo" => "Confirmar",
            "alertas" => $alertas
        ]);
    }

    public static function perfil(Router $router)
    {

        isAuth();

        $alertas = [];

        $usuarioId = Usuario::find($_SESSION['id']);
        $usuario = new Usuario;
        $roles = Rol::all();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $usuarioId->sincronizar($_POST);
            $alertas = $usuarioId->validar();

            //Verificar que alertas este vacio
            if (empty($alertas)) {
                $resultado = $usuarioId->guardar();
                if ($resultado) {
                    header("Location: /dashboard");
                }
            }
        }
        $router->render("usuarios/perfil", [
            "titulo" => "Perfil",
            "alertas" => $alertas,
            "usuarioId" => $usuarioId,
            "roles" => $roles
        ]);
    }
}

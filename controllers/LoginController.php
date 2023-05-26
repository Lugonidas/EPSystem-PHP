<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                //Comprobar que exista el usuario
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    //verificar password
                    if ($usuario->comprobarPasswordAndConfirmado($auth->password)) {

                        //Autenticar al usuario
                        if (!isset($_SESSION)) {
                            session_start();
                        };

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        header("Location: /dashboard");
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            "titulo" => "Iniciar Sesión",
            "alertas" => $alertas
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function olvide(Router $router)
    {

        $alertas = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario && $usuario->confirmado === "1") {

                    //Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();


                    //Alerta de exito
                    Usuario::setAlerta("exito", "Hemos enviado un email de vefiricación");
                } else {
                    Usuario::setAlerta("error", "El usuario no existe o no está confirmado");
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide-password', [
            "titulo" => "Olvide Password",
            "alertas" => $alertas
        ]);
    }

    public static function recuperar(Router $router)
    {
        $alertas = [];

        $error = false;

        $token = s($_GET['token']);

        //Buscar al usuario por el token
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta("error", "Token no válido");
            $error = true;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //Leer el nuevo password y guardarlo
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                //Elimina el password anterior
                $usuario->password = null;

                //Agregar el nuevo password
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = "";

                $resultado = $usuario->guardar();

                if ($resultado) {
                    header("Location: /");
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render("auth/recuperar-password", [
            "titulo" => "Recuperar Password",
            "alertas" => $alertas,
            "error" => $error
        ]);
    }

    public static function confirmar(Router $router)
    {
        $alertas = [];

        $token = s($_GET["token"]);

        //Buscar usuario por token
        $usuario = Usuario::where("token", $token);

        if (empty($usuario)) {
            //Mostrar mensaje de error
            Usuario::setAlerta('error', 'Tokén no válido');
        } else {
            //Modificar usuario a confirmado
            $usuario->confirmado = "1";
            $usuario->token = "";
            $resultado = $usuario->guardar();
            if ($resultado) {
                Usuario::setAlerta('exito', 'Cuenta Confirmada Correctamente');
            }
        }

        //Obtener las alertas
        $alertas = Usuario::getAlertas();

        //Renderizar la vista
        $router->render('auth/confirmar', [
            "titulo" => "Confirmar",
            "alertas" => $alertas,
            "usuario" => $usuario
        ]);
    }
}

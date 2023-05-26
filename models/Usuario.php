<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'direccion', 'email', 'password', 'token', 'confirmado', 'rol', 'imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $email;
    public $password;
    public $token;
    public $confirmado;
    public $rol;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
        $this->apellido = $args['apellido'] ?? "";
        $this->telefono = $args['telefono'] ?? "";
        $this->direccion = $args['direccion'] ?? "";
        $this->email = $args['email'] ?? "";
        $this->password = $args['password'] ?? "";
        $this->token = $args['token'] ?? "";
        $this->confirmado = $args['confirmado'] ?? "0";
        $this->rol = $args['rol'] ?? null;
        $this->imagen = $args['imagen'] ?? "";
    }

    //Validar la creación de usuarios
    public function validarNuevoUsuario()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = "El teléfono es obligatorio";
        }
        if (strlen($this->telefono) !== 10) {
            self::$alertas['error'][] = "El número de celular no es válido";
        }
        if (!$this->direccion) {
            self::$alertas['error'][] = "La dirección es obligatoria";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "El email es obligatorio";
        }
        if (!$this->password) {
            self::$alertas['error'][] = "El password es obligatorio";
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = "El password debe contener al menos 6 carácteres";
        }
        if (!$this->rol) {
            self::$alertas['error'][] = "El rol del usuario es obligatorio";
        }
        if (!$this->imagen) {
            self::$alertas['error'][] = "La imagen es obligatoria";
        }
        return self::$alertas;
    }

    //Validar la actualización de usuarios
    public function actualizarUsuario()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = "El teléfono es obligatorio";
        }
        if (strlen($this->telefono) !== 10) {
            self::$alertas['error'][] = "El número de celular no es válido";
        }
        if (!$this->direccion) {
            self::$alertas['error'][] = "La dirección es obligatoria";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "El email es obligatorio";
        }
        if (!$this->rol) {
            self::$alertas['error'][] = "El rol del usuario es obligatorio";
        }
        return self::$alertas;
    }

    //Subida de archivos
    public function setImagen($imagen)
    {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Revisa si el usuario ya existe
    public function existeUsuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = "El usuario ya está registrado";
        }
        return $resultado;
    }

    //Hashear el password
    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //Validar
    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = "El email es obligatorio";
        }

        return self::$alertas;
    }

    //Validar el Inicio de Sesión
    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        return self::$alertas;
    }

    //Validar Password
    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = "El password es obligatorio";
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = "El password debe contener al menos 6 carácteres";
        }
        return self::$alertas;
    }

    //Crear token
    public function crearToken()
    {
        $this->token = uniqid();
    }

    //Comprobar password y verificado
    public function comprobarPasswordAndConfirmado($password)
    {
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = "Constraseña incorrecta o cuenta no verificada";
        } else {
            return true;
        }
    }

    public function rol()
    {
        if ($this->rol === "1") {
            return "Administrador";
        } elseif ($this->rol === "2") {
            return "Cajero";
        } else {
            return "Cliente";
        }
    }
}

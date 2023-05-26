<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = "clientes";
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'direccion', 'email', 'noDocumento'];

    public $noDocumento;
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
        $this->apellido = $args['apellido'] ?? "";
        $this->telefono = $args['telefono'] ?? "";
        $this->direccion = $args['direccion'] ?? "";
        $this->noDocumento = $args['noDocumento'] ?? "";
        $this->email = $args['email'] ?? "";
    }

    //Validar la creación de clientes
    public function validar()
    {
        if (!$this->noDocumento) {
            self::$alertas['error'][] = "El número de documento es obligatorio";
        }
        if (!$this->nombre) {
            self::$alertas['error'][] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = "El telefono es obligatorio";
        }
        if (!$this->direccion) {
            self::$alertas['error'][] = "El direccion es obligatorio";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "El email es obligatorio";
        }
        return self::$alertas;
    }

    //Revisa si el cliente ya está registrado
    public function existeCliente()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = "El cliente ya está registrado";
        }
        return $resultado;
    }
}

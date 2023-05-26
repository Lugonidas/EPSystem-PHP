<?php

namespace Model;

class Proveedor extends ActiveRecord
{
    protected static $tabla = "proveedores";
    protected static $columnasDB = ['id', 'nombre', 'telefono', 'direccion', 'email'];

    public $id;
    public $nombre;
    public $telefono;
    public $direccion;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
        $this->telefono = $args['telefono'] ?? "";
        $this->direccion = $args['direccion'] ?? "";
        $this->email = $args['email'] ?? "";
    }

    //Validar la creación de clientes
    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = "El nombre es obligatorio";
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
    public function existeProveedor()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = "El cliente ya está registrado";
        }
        return $resultado;
    }
}

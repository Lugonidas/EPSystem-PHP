<?php


namespace Model;

class Unidad extends ActiveRecord{
    protected static $tabla = 'unidades';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
    }

}
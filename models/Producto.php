<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = "productos";
    protected static $columnasDB = ['id', 'nombre', 'precioCompra', 'precioVenta', 'unidad', 'stock'];

    public $id;
    public $nombre;
    public $precioCompra;
    public $precioVenta;
    public $unidad;
    public $stock;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
        $this->precioCompra = $args['precioCompra'] ?? null;
        $this->precioVenta = $args['precioVenta'] ?? null;
        $this->unidad = $args['unidad'] ?? null;
        $this->stock = $args['stock'] ?? null;
    }

        //Validar la creación de productos
        public function validarNuevoProducto()
        {
            if (!$this->nombre) {
                self::$alertas['error'][] = "El nombre es obligatorio";
            }
            if (!$this->precioCompra) {
                self::$alertas['error'][] = "El precio de compra es obligatorio";
            }
            if (!$this->precioVenta) {
                self::$alertas['error'][] = "El precio de venta es obligatorio";
            }
            if (!$this->unidad) {
                self::$alertas['error'][] = "La unidad es obligatoria";
            }
            if (!$this->stock) {
                self::$alertas['error'][] = "La cantidad es obligatorio";
            }
            return self::$alertas;
        }
}

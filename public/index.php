<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\ClienteController;
use Controllers\CompraController;
use Controllers\ConfiguracionController;
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\UsuarioController;
use Controllers\ProductoController;
use Controllers\ProveedorController;
use Controllers\VentaController;

use MVC\Router;

$router = new Router();

//Iniciar Sesión
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Recuperar Password
$router->get('/olvide-password', [LoginController::class, 'olvide']);
$router->post('/olvide-password', [LoginController::class, 'olvide']);
$router->get('/recuperar-password', [LoginController::class, 'recuperar']);
$router->post('/recuperar-password', [LoginController::class, 'recuperar']);

//Confirmar
$router->get('/confirmar', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Areá privada

//Dashboard
$router->get('/dashboard', [DashboardController::class, 'index']);

//Usuarios
$router->get('/usuarios', [UsuarioController::class, 'index']);
$router->get('/crear-usuario', [UsuarioController::class, 'crearUsuario']);
$router->post('/crear-usuario', [UsuarioController::class, 'crearUsuario']);
$router->get('/actualizar-usuario', [UsuarioController::class, 'actualizarUsuario']);
$router->post('/actualizar-usuario', [UsuarioController::class, 'actualizarUsuario']);
$router->post('/eliminar-usuario', [UsuarioController::class, 'eliminarUsuario']);
$router->get("/perfil", [UsuarioController::class, 'perfil']);
$router->post("/perfil", [UsuarioController::class, 'perfil']);

//Clientes
$router->get('/clientes', [ClienteController::class, 'index']);
$router->get('/crear-cliente', [ClienteController::class, 'crearCliente']);
$router->post('/crear-cliente', [ClienteController::class, 'crearCliente']);
$router->get('/actualizar-cliente', [ClienteController::class, 'actualizarCliente']);
$router->post('/actualizar-cliente', [ClienteController::class, 'actualizarCliente']);
$router->post('/eliminar-cliente', [ClienteController::class, 'eliminarCliente']);

//Proveedores
$router->get('/proveedores', [ProveedorController::class, 'index']);
$router->get('/crear-proveedor', [ProveedorController::class, 'crearProveedor']);
$router->post('/crear-proveedor', [ProveedorController::class, 'crearProveedor']);
$router->get('/actualizar-proveedor', [ProveedorController::class, 'actualizarProveedor']);
$router->post('/actualizar-proveedor', [ProveedorController::class, 'actualizarProveedor']);
$router->post('/eliminar-proveedor', [ProveedorController::class, 'eliminarProveedor']);

//Productos
$router->get('/productos', [ProductoController::class, 'index']);
$router->get('/crear-producto', [ProductoController::class, 'crearProducto']);
$router->post('/crear-producto', [ProductoController::class, 'crearProducto']);
$router->get('/actualizar-producto', [ProductoController::class, 'actualizarProducto']);
$router->post('/actualizar-producto', [ProductoController::class, 'actualizarProducto']);
$router->post('/eliminar-producto', [ProductoController::class, 'eliminarProducto']);

//Compras
$router->get('/compras', [CompraController::class, 'index']);

//Reportes
$router->get('/reportes', [DashboardController::class, 'reporte']);

//Configuración
$router->get('/configuracion', [DashboardController::class, 'configuracion']);



//Confirmar Cuenta
$router->get('/mensaje', [UsuarioController::class, 'mensaje']);
$router->post('/confirmar', [UsuarioController::class, 'confirmar']);

//Configurar Programa
$router->get('/config', [ConfiguracionController::class, 'index']);

//Reportes
$router->get('/reportes', [ConfiguracionController::class, 'reportes']);

//API Ventas 
$router->get('/api/productos', [APIController::class, 'index']);
$router->get('/ventas', [VentaController::class, 'index']);
$router->get('/crear-venta', [VentaController::class, 'crearVenta']);
$router->post('/crear-venta', [VentaController::class, 'crearVenta']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

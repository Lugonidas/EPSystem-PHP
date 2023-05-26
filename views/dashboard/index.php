<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<main class="contenedor">
    <div class="cuadros">
        <div class="cuadro-contenido">
            <div class="info">
                <h2>30</h2>
                <p>Ventas del último mes</p>
            </div>
            <i class="icono fa-solid fa-cart-shopping"></i>
        </div>
        <div class="cuadro-contenido">
            <div class="info">
                <h2><?php echo sizeof($usuarios); ?></h2>
                <p>Total de Usuarios</p>
            </div>
            <i class="icono fa-solid fa-users"></i>
        </div>
        <div class="cuadro-contenido">
            <div class="info">
                <h2><?php echo sizeof($productos); ?></h2>
                <p>Total de Productos</p>
            </div>
            <i class="icono fa-solid fa-cubes"></i>
        </div>
        <div class="cuadro-contenido">
            <div class="info">
                <h2><?php echo sizeof($clientes); ?></h2>
                <p>Total de Clientes</p>
            </div>
            <i class="icono fa-solid fa-arrows-down-to-people"></i>
        </div>
    </div>

    <div class="cuadros-botones">
        <form action="/crear-venta">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class=" img" src="/build/img/carrito.webp" type="Image/webp">
                    <source class="img" src="/build/img/carrito.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/carrito.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Realizar una venta</h3>
                </div>
            </button>
        </form>
        <form action="/crear-usuario">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class=" img" src="/build/img/usuario.webp" type="Image/webp">
                    <source class="img" src="/build/img/usuario.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/usuario.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Agregar un usuario</h3>
                </div>
            </button>
        </form>
        <form action="/crear-cliente">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class=" img" src="/build/img/cliente.webp" type="Image/webp">
                    <source class="img" src="/build/img/cliente.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/cliente.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Agregar un cliente</h3>
                </div>
            </button>
        </form>
        <form action="/crear-proveedor">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class=" img" src="/build/img/proveedor.webp" type="Image/webp">
                    <source class="img" src="/build/img/proveedor.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/proveedor.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Agregar un proveedor</h3>
                </div>
            </button>
        </form>
        <form action="/crear-producto">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class="img" src="/build/img/agregarProducto.webp" type="Image/webp">
                    <source class="img" src="/build/img/agregarProducto.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/agregarProducto.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Agregar un producto</h3>
                </div>
            </button>
        </form>
        <form action="/config">
            <button class="cuadro-boton" type="submit">
                <picture>
                    <source class=" img" src="/build/img/configuracion.webp" type="Image/webp">
                    <source class="img" src="/build/img/configuracion.png" type="Image/png">
                    <img class="img" loading="lazy" src="/build/img/configuracion.png" alt="Imagen Logo">
                </picture>
                <div class="cuadro-texto">
                    <h3 id="realizar-venta">Configuración</h3>
                </div>
            </button>
        </form>

    </div>
</main>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>
<header class="header">
    <div class="barra">
        <a class="nombre" href="/perfil"><i class="fas fa-user-circle"></i><span><?php echo s($_SESSION['nombre']); ?></span></a>
        <a href="/logout" class="boton-verde-inline">Cerrar Sesión</a>
    </div>
    <div class="sidebar">
        <a class="logo <?php echo ($titulo === "Dashboard") ? 'activo' : ''; ?>" href="/dashboard"><i class="fa-solid fa-house"></i><span>EPS</span>ystem</a>

        <nav class="sidebar-nav">
            <div class="links">
                <?php if ($usuarioId->rol === "1") : ?>
                    <a class="<?php echo ($titulo === "Usuarios") ? 'activo' : ''; ?>" href="/usuarios"><i class="fas fa-user"></i>Usuarios</a>
                <?php endif; ?>
                <a class="<?php echo ($titulo === "Clientes") ? 'activo' : ''; ?>" href="/clientes"><i class="fas fa-user"></i>Clientes</a>
                <a class="<?php echo ($titulo === "Proveedores") ? 'activo' : ''; ?>" href="/proveedores"><i class="fas fa-user"></i>Proveedores</a>
                <a class="<?php echo ($titulo === "Productos") ? 'activo' : ''; ?>" href="/productos"><i class="fas fa-gifts"></i></i>Productos</a>
                <a class="<?php echo ($titulo === "Compras") ? 'activo' : ''; ?>" href="/compras"><i class="fas fa-shopping-basket"></i>Compras</a>
                <a class="<?php echo ($titulo === "Ventas") ? 'activo' : ''; ?>" href="/ventas"><i class="fas fa-clipboard-check"></i>Ventas</a>
                <a class="<?php echo ($titulo === "Reportes") ? 'activo' : ''; ?>" href="/reportes"><i class="fas fa-file-download"></i>Reportes</a>
                <?php if ($usuarioId->rol === "1") : ?>
                    <a class="<?php echo ($titulo === "Configuracion") ? 'activo' : ''; ?>" href="/config"><i class="fas fa-cogs"></i>Configuración</a>
                <?php endif; ?>
            </div>
            <div class="menu-mobile">
                <i class="mobile fa-solid fa-bars"></i>
                <i class="btn-dark-mode fa-solid fa-circle-half-stroke"></i>
            </div>
        </nav>
    </div>
</header>
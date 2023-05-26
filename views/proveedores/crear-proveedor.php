<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
    <div class="opciones">
        <a href="/proveedores" class="boton-volver">Volver</a>
    </div>

    <form class="formulario" method="POST" action="/crear-proveedor">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Datos Proveedor</legend>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres">
                </div>
                <div class="campo">
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono">
                </div>
            </div>
            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="campo">
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección">
                </div>
            </div>
        </fieldset>

        <input type="submit" class="boton" value="Crear">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
<div class="opciones">
        <a href="/proveedores" class="boton-volver">Volver</a>
    </div>

    <form class="formulario" method="POST">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Datos del proveedor</legend>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo s($proveedor->nombre); ?>">
                </div>
                <div class="campo">
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($proveedor->telefono); ?>">
                </div>
            </div>
            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($proveedor->email); ?>">
                </div>
                <div class="campo">
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo s($proveedor->direccion); ?>">
                </div>
            </div>
        </fieldset>

        <input type="submit" class="boton" value="Actualizar">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
    <div class="opciones">
        <a href="/productos" class="boton-volver">Volver</a>
    </div>

    <form class="formulario" method="POST" action="/crear-producto">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Información General</legend>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre Producto">
                </div>
                <div class="campo">
                    <input type="tel" id="precioCompra" name="precioCompra" placeholder="Precio Compra Producto">
                </div>
            </div>
            <div class="campos">
                <div class="campo">
                    <input type="number" id="precioVenta" name="precioVenta" placeholder="Precio Venta Producto">
                </div>
                <div class="campo">
                    <label for="unidad">Unidad</label>
                    <select name="unidad" id="unidad">
                        <option selected disabled>--Seleccione--</option>
                        <?php foreach ($unidades as $unidad) : ?>
                            <option <?php echo $producto->unidad === $unidad->id ? 'selected' : ""; ?> value="<?php echo s($unidad->id); ?>"><?php echo s($unidad->nombre); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="campos">
                <div class="campo">
                    <input type="number" id="cantidad" name="stock" min="1" placeholder="Cantidad Producto">
                </div>
            </div>
        </fieldset>

        <input type="submit" class="boton" value="Crear">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
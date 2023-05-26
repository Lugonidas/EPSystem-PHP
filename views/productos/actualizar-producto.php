<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
    <div class="opciones">
        <a href="/productos" class="boton-volver">Volver</a>
    </div>

    <form class="formulario" method="POST">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Datos del producto</legend>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre Producto" value="<?php echo s($producto->nombre); ?>">
                </div>
                <div class="campo">
                    <input type="tel" id="precioCompra" name="precioCompra" placeholder="Precio Compra Producto" value="<?php echo s($producto->precioCompra); ?>">
                </div>
            </div>
            <div class="campos">
                <div class="campo">
                    <input type="number" id="precioVenta" name="precioVenta" placeholder="Precio Venta Producto" value="<?php echo s($producto->precioVenta); ?>">
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
                    <input type="number" id="cantidad" name="stock" placeholder="Cantidad Producto" value="<?php echo s($producto->stock); ?>">
                </div>
            </div>
        </fieldset>

        <input type="submit" class="boton" value="Actualizar">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
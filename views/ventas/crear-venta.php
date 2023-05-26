<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="ventas">

    <div class="izquierda">
        <div class="opciones">
            <a href="/ventas" class="boton-volver">Volver</a>
        </div>

        <form action="/crear-venta" class="formulario" method="POST">
            <div class="campos">
                <div class="campo">
                    <label for="cliente">Cliente<a class="agregar-usuario" href="/crear-usuario"><i class="fa-solid fa-user-plus"></i></a></label>
                    <input type="search" id="buscadorCliente" placeholder="Introduzca el código del cliente">
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="nombre" disabled>
                </div>
            </div>
        </form>

        <table class="tabla-productos buscador">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr id="contenedor-productos">
                    <td id="codigoProducto"><input type="search" id="buscador" name="idProducto" placeholder="Código del producto"></td>
                    <td id="nombreProducto"><?php echo $idProducto->nombre ?? ''; ?></td>
                    <td id="precioProducto"><?php echo $idProducto->precioVenta ?? ''; ?></td>
                    <td id="cantidadProducto"></td>
                    <td id="acciones">
                        <button class="agregar boton-verde-inline">Agregar</button>
                    </td>
                </tr>
            </tbody>
        </table>



        <table class="tabla-productos buscador carrito">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="items">
            </tbody>
            <tfoot id="footer-carrito">
            </tfoot>
        </table>
    </div>

    <template id="template-carrito">
        <tr>
            <td id="carritoCodigo"></td>
            <td id="carritoNombre"></td>
            <td id="carritoCantidad"></td>
            <td id="carritoTotal"></td>
            <td id="acciones">
                <button class="mas">+</button>
                <button class="menos">-</button>
            </td>
        </tr>
    </template>

    <template id="template-footer">
        <th>TOTAL</th>
        <tr>
            <td></td>
            <td id="cantidad-productos"></td>
            <td id="total-productos"></td>
        </tr>
    </template id="template-total">

    <template id="template-factura">
        <label id="total-ventas"></label>
    </template>

    <div class="formulario factura" id="factura">
        <div class="tipo-pago">
            <label for="rol">Tipo de pago</label>
            <select name="rol" id="rol">
                <option selected disabled>Seleccione</option>
                <?php foreach ($roles as $rol) : ?>
                    <option <?php echo $usuario->rol === $rol->id ? 'selected' : ""; ?> value="<?php echo s($rol->id); ?>"><?php echo s($rol->nombre); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campos">
            <div class="campo">
                <label for="NoVenta">No Venta</label>
                <input type="number" id="noVenta" value="000034">
            </div>
        </div>
        <div class="campos">
            <div class="campo">
                <label for="efectivoRecibido">Efectivo Recibido</label>
                <input type="number" id="efectivoRecibido" value="50000">
            </div>
            <div class="campo">
                <label>Monto Recibido</label>
                <p>$ 50.000</p>
            </div>
        </div>
        <div class="campo-div">
            <label>Vueltas</label>
            <p>$ 0.0</p>
        </div>
        <div class="campo-div">
            <label>Subtotal</label>
            <p>$ 0.0</p>
        </div>
        <div class="campo-div">
            <label for="iva" class="iva">Iva</label>
            <p>$ 0.0</p>
        </div>
        <div class="campo-div">
            <label class="label-total">Total</label>
            <p class="total">$ 0.0</p>
        </div>
        <div class="campo-div">
            <button id="realizarVenta" class="boton">Realizar Venta</button>
        </div>

    </div>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>

<?php
/* $script = "<script src='build/js/buscador.js'></script>"; */
/* $script .= "<script src='build/js/app.js'></script>"; */
?>
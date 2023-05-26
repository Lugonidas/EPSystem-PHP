<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<?php if ($usuarioId->rol === "1") : ?>
    <div class="contenedor opciones">
        <a href="/crear-producto" class="boton-crear">Agregar Producto</a>
    </div>
<?php endif; ?>

<main class="contenedor">
    <article class="productos">
        <?php foreach ($productos as $producto) : ?>
            <div class="producto">
                <h3><?php echo $producto->nombre; ?></h3>
                <!-- <img src="" alt="imagen"> -->
                <p>ID: <?php echo $producto->id; ?></p>
                <p>Precio Compra: <?php echo $producto->precioCompra; ?></p>
                <p>Precio Venta: <?php echo $producto->precioVenta; ?></p>
                <p>Unidad: <?php echo $producto->unidad; ?></p>
                <p>Cantidad: <?php echo $producto->stock; ?></p>
                <?php if ($usuarioId->rol === "1") : ?>
                    <div class="acciones">
                        <form method="POST" action="/eliminar-producto">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>"></input>
                            <input type="submit" class="boton-rojo" value=""></input>
                        </form>
                        <a href="/actualizar-producto?id=<?php echo s($producto->id); ?>" class="boton-verde"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </article>
</main>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor opciones">
    <a href="/crear-proveedor" class="boton-crear">Agregar Proveedor</a>
</div>

<main class="contenedor">
    <div class="usuarios">
        <?php foreach ($proveedores as $proveedor) : ?>
            <div class="usuario">
                <h3>ID: <?php echo $proveedor->id; ?></h3>
                <p>Nombre: <?php echo $proveedor->nombre; ?></p>
                <p>Teléfono: <?php echo $proveedor->telefono; ?></p>
                <p>Email: <?php echo $proveedor->email; ?></p>
                <p>Direccion: <?php echo $proveedor->direccion; ?></p>
                <div class="acciones">
                    <form method="POST" action="/eliminar-proveedor">
                        <input type="hidden" name="id" value="<?php echo $proveedor->id; ?>"></input>
                        <input type="submit" class="boton-rojo-inline" value=""></input>
                    </form>
                    <a href="/actualizar-proveedor?id=<?php echo $proveedor->id; ?>" class="boton-verde-inline"><i class="fa-solid fa-pencil"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>


<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
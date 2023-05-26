<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor opciones">
    <a href="/crear-cliente" class="boton-crear">Agregar Cliente</a>
</div>

<main class="contenedor">
    <div class="usuarios">
        <?php foreach ($clientes as $cliente) : ?>
            <div class="usuario">
                <h3>ID: <?php echo $cliente->id; ?></h3>
                <p>Nombres: <?php echo $cliente->nombre . " " . $cliente->apellido; ?></p>
                <p>Teléfono: <?php echo $cliente->telefono; ?></p>
                <p>Email: <?php echo $cliente->email; ?></p>
                <div class="acciones">
                    <form method="POST" action="/eliminar-cliente">
                        <input type="hidden" name="id" value="<?php echo $cliente->id; ?>"></input>
                        <input type="submit" class="boton-rojo-inline" value=""></input>
                    </form>
                    <a href="/actualizar-cliente?id=<?php echo $cliente->id; ?>" class="boton-verde-inline"><i class="fa-solid fa-pencil"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>


<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
<?php

declare(strict_types=1);
include_once __DIR__ . '/../dashboard/header-dashboard.php';
?>

<div class="contenedor opciones">
    <a href="/crear-usuario" class="boton-crear">Agregar Usuario</a>
</div>

<main class="contenedor">
    <div class="usuarios">
        <?php foreach ($usuarios as $usuario) : ?>
            <div class="usuario">
                <h3>Código: <?php echo $usuario->id; ?></h3>
                <!-- <img src="../../public/build/img/agregarProducto.png" alt="Imagen Usuario" width="100px" height="100px"> -->
                <p>Nombres: <?php echo $usuario->nombre . " " . $usuario->apellido; ?></p>
                <p>Teléfono: <?php echo $usuario->telefono; ?></p>
                <p>Email: <?php echo $usuario->email; ?></p>
                <p>Confimado: <?php echo $usuario->confirmado; ?></p>
                <p>Tipo Usuario: <?php if ($usuario->rol === "1") {
                                        echo "Admin";
                                    } elseif ($usuario->rol === "2") {
                                        echo "Cajero";
                                    } else {
                                        echo "Cliente";
                                    } ?></p>
                <div class="acciones">
                    <form method="POST" action="/eliminar-usuario">
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>"></input>
                        <input type="submit" class="boton-rojo-inline" value=""></input>
                    </form>
                    <a href="/actualizar-usuario?id=<?php echo $usuario->id; ?>" class="boton-verde-inline"><i class="fa-solid fa-pencil"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
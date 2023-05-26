<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
    <div class="opciones">
        <a href="/clientes" class="boton-volver">Volver</a>
    </div>
    <form class="formulario cliente" method="POST">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Información General</legend>

            <div class="campos">
                <div class="campo">
                    <input type="number" id="noDocumento" name="noDocumento" placeholder="Número de documento" value="<?php echo s($cliente->noDocumento); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($cliente->nombre); ?>">
                </div>
                <div class="campo">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($cliente->apellido); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($cliente->telefono); ?>">
                </div>
                <div class="campo">
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo s($cliente->direccion); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($cliente->email); ?>">
                </div>
            </div>

        </fieldset>

        <input type="submit" class="boton" value="Actualizar">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
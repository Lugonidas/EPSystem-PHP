<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>

<div class="contenedor">
    <div class="opciones">
        <a href="/usuarios" class="boton-volver">Volver</a>
    </div>
    <form class="formulario usuario" method="POST">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Datos del usaurio</legend>

            <div class="campos">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($usuarioId->nombre); ?>">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($usuarioId->apellido); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($usuarioId->telefono); ?>">
                </div>
                <div class="campo">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo s($usuarioId->direccion); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($usuarioId->email); ?>">
                </div>
                <div class="campo">
                    <label for="rol">Tipo Usuario</label>
                    <select name="rol" id="rol">
                        <option selected disabled>--Seleccione--</option>
                        <?php foreach ($roles as $rol) : ?>
                            <option <?php echo $usuarioId->rol === $rol->id ? 'selected' : ""; ?> value="<?php echo s($rol->id); ?>"><?php echo s($rol->nombre); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

        </fieldset>

        <input type="submit" class="boton" value="Actualizar">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
<?php include_once __DIR__ . '/../dashboard/header-dashboard.php'; ?>
<div class="contenedor usuario">

    <div class="opciones">
        <a href="/usuarios" class="boton-volver">Volver</a>
    </div>
    <form class="formulario" method="POST" action="/crear-usuario" enctype="multipart/form-data">
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <fieldset>
            <legend>Datos del usuario</legend>

            <div class="campos">
                <div class="campo">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($usuario->nombre); ?>">
                </div>
                <div class="campo">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($usuario->apellido); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo s($usuario->telefono); ?>">
                </div>
                <div class="campo">
                    <input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo s($usuario->direccion); ?>">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo s($usuario->email); ?>">
                </div>
                <div class="campo">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
            </div>

            <div class="campos">
                <div class="campo">
                    <label for="rol">Tipo Usuario</label>
                    <select name="rol" id="rol">
                        <option selected disabled>Seleccione</option>
                        <?php foreach ($roles as $rol) : ?>
                            <option <?php echo $usuario->rol === $rol->id ? 'selected' : ""; ?> value="<?php echo s($rol->id); ?>"><?php echo s($rol->nombre); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept="image/jpeg,image/png">
                </div>
            </div>


        </fieldset>

        <input type="submit" class="boton" value="Crear">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php'; ?>
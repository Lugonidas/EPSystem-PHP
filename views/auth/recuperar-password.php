<div class="contenedor login">
    <h1 class="epsystem">EPSystem</h1>
    <div class="contenedor-sm">
        <p class="descripcion">Ingresa tu nuevo password</p>
        <?php
        include_once __DIR__ . "/../templates/alertas.php";
        ?>
        <?php if ($error) return; ?>
        <form method="POST" class="formulario login">
            <div class="campos">
                <div class="campo">
                    <input type="password" id="password" placeholder="Nuevo Password" name="password">
                </div>
            </div>

            <input type="submit" class="boton" value="Guardar Password">
            </form>

            <div class="acciones">
                <a href="/">¿Ya tienes cuenta? Iniciar Sesión</a>
            </div>
    </div>
</div>
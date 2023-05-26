<div class="contenedor login">
    <h1 class="epsystem">EPSystem</h1>
    <div class="contenedor-sm">
        <p class="descripcion">Restable tu password escribiendo tu email</p>
        <form method="POST" class="formulario login" action="/olvide-password">
            <?php
            include_once __DIR__ . "/../templates/alertas.php";
            ?>
            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" placeholder="Tu Email" name="email">
                </div>
            </div>
            <input type="submit" class="boton" value="Enviar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes cuenta? Iniciar Sesión</a>
        </div>
    </div>
</div>
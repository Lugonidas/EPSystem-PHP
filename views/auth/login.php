<div class="contenedor login">
    <h1 class="epsystem">EPSystem</h1>
    <div class="logo-imagen">
        <picture>
            <source class="img" src="/build/img/background.webp" type="Image/webp">
            <source class="img" src="/build/img/background.png" type="Image/png">
            <img class="img" loading="lazy" src="/build/img/background.png" alt="Imagen Logo">
        </picture>
    </div>
    <div class="contenedor-sm">
        <form method="POST" class="formulario login" action="/">
            <?php
            include_once __DIR__ . "/../templates/alertas.php";
            ?>
            <div class="campos">
                <div class="campo">
                    <input type="email" id="email" placeholder="Email" name="email">
                </div>
                <div class="campo">
                    <input type="password" id="password" placeholder="Password" name="password">
                </div>
            </div>
            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>

        <div class="acciones">
            <a href="/olvide-password">¿Olvidaste tu password?</a>
        </div>
    </div>
</div>
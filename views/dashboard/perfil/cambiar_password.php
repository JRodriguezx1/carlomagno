<main class="perfil style-main">
    <h2 class="heading-inicio">Fundacion Carlo Magno</h2>
    
    <h3>Cambiar Password</h3>
    <div class="btn"><a href="/admin/dashboard/perfil" class="enlace">Volver al perfil</a> </div>
    <div class="form-dashboard">
        <?php include_once __DIR__."/../../templates/alertas.php";?>

        <form class="formulario" method="POST"  action="/admin/dashboard/cambiar_password">
            <div class="formulario-campo">
                <label class="formulario-label" for="contraseña">Password Actual</label>
                <input class="formulario-input" id="contraseña" name="password" type="password" placeholder="Tu contraseña actual">
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="contraseña">Nuevo Password</label>
                <input class="formulario-input" id="contraseña" name="password2" type="password" placeholder="Tu nueva contraseña">
            </div>
            <input class="formulario-submit--secundario"  type="submit" value="Guardar cambios">
        </form>
    </div>

</main>
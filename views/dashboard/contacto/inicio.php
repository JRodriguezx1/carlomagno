<main class="editar-contacto style-main">
    <h2 class="heading-inicio">Fundacion Carlo Magno</h2>
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Pagina de Contacto</h3>
    <div class="form-contacto">
    <form class="formulario" action="/admin/dashboard/editar_contacto" method="POST">
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend"> <i class="fa-solid fa-location-dot"></i> Direcciones</legend>
            <textarea name="direccion" cols="30" rows="6"><?php echo $contacto[0]->direccion ??''; ?></textarea>
            <label data-num="599" class="campo-contchart">599</label>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend"><i class="fa-solid fa-phone"></i> Contactos</legend>
            <textarea name="contacto" cols="30" rows="6"><?php echo $contacto[0]->contacto ??''; ?></textarea>
            <label data-num="499" class="campo-contchart">499</label>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend"><i class="fa-solid fa-calendar-days"></i> Horarios</legend>
            <textarea name="horario" cols="30" rows="6"><?php echo $contacto[0]->horario ??''; ?></textarea>
            <label data-num="499" class="campo-contchart">499</label>
        </fieldset>
        <input class="formulario-submit--secundario" type="submit" value="Guardar">
    </form>
    </div>

</main>
<main class="editar-nosotros style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Pagina Nosotros</h3>
    <form class="formulario"  action="/admin/dashboard/editar_nosotros" method="POST">
        <fieldset  class="formulario-fielsed">
            <legend class="formulario-legend">Descripcion de Bienvenidos</legend>
            <textarea name="bienvds" cols="30" rows="4"><?php echo $info->bienvds ?? ''; ?></textarea>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend">Mision</legend>
            <textarea name="mision" cols="30" rows="4"><?php echo $info->mision ?? ''; ?></textarea>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend">Vision</legend>
            <textarea name="vision" cols="30" rows="4"><?php echo $info->vision ?? ''; ?></textarea>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend">Objetivos</legend>
            <textarea name="objetivos" cols="30" rows="4"><?php echo $info->objetivos ?? ''; ?></textarea>
        </fieldset>
        <fieldset class="formulario-fielsed">
            <legend class="formulario-legend"> Biografia </legend>
            <textarea name="biografia" cols="30" rows="4"><?php echo $info->biografia ?? ''; ?></textarea>
        </fieldset>
        <input class="formulario-submit--secundario" type="submit" value="Guardar">
    </form>
</main>

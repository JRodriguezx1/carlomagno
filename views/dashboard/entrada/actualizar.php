<main class="contenedor-actualizar">
    <div class="btn">
        <a href="/admin/dashboard/entrada">Volver</a>
    </div>
    <div class="form-dashboard">  <!-- clase semiglobal que esta en dashboard.scss -->
        <?php include __DIR__. "/../../templates/alertas.php"; ?>
        <form class="formulario" method="POST" action="/admin/dashboard/update-infobasic" enctype="multipart/form-data">
            <fieldset class="formulario-fielsed">
                <legend class="formulario-legend">Informacion del instituto</legend>
                <div class="formulario-campo">
                    <label class="formulario-label" for="direccion_p">Direccion principal</label>
                    <input class="formulario-input" type="text" id="direccion_p" name="direccion_p" placeholder="Direccion Principal" value="<?php echo $info[0]->direccion_p ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="tel1">Telefono 1</label>
                    <input class="formulario-input" type="number" id="tel1" name="tel1" placeholder="Telefono" value="<?php echo $info[0]->tel1 ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="tel2">Telefono 2</label>
                    <input class="formulario-input" type="number" id="tel2" name="tel2" placeholder="Telefono" value="<?php echo $info[0]->tel2 ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="whatsapp">Whatsapp</label>
                    <input class="formulario-input" type="number" id="whatsapp" name="whatsapp" placeholder="whatsapp" value="<?php echo $info[0]->whatsapp ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="nit">Nit</label>
                    <input class="formulario-input" type="text" id="nit" name="nit" placeholder="Nit" value="<?php echo $info[0]->nit ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="logo">Logo</label>
                    <input class="formulario-input formulario-file" type="file" id="logo" name="logo">
                </div>
            </fieldset>

            <fieldset class="formulario-fielsed">
                <legend class="formulario-legend">Informacion Legal</legend>
                <textarea name="infolegal" cols="30" rows="4"><?php echo $info[0]->infolegal ?? ''; ?></textarea>
            </fieldset>

            <fieldset class="formulario-fielsed">
                <legend class="formulario-legend">Redes Sociales</legend>
                <div class="formulario-campo">
                    <div class="formulario-contenedor-icono">
                        <div class="formulario-icono"><i class="fa-brands fa-facebook"></i></div>
                        <input class="formulario-input-sociales" type="text" name="facebook" placeholder="Facebook" value="<?php echo $info[0]->facebook ?? ''; ?>">
                    </div>
                </div>
                <div class="formulario-campo">
                    <div class="formulario-contenedor-icono">
                        <div class="formulario-icono"><i class="fa-brands fa-instagram"></i></div>
                        <input class="formulario-input-sociales" type="text" name="instagram" placeholder="Instagram" value="<?php echo $info[0]->instagram ?? ''; ?>">
                    </div>
                </div>
                <div class="formulario-campo">
                    <div class="formulario-contenedor-icono">
                        <div class="formulario-icono"><i class="fa-brands fa-youtube"></i></div>
                        <input class="formulario-input-sociales" type="text" name="youtube" placeholder="Youtube" value="<?php echo $info[0]->youtube ?? ''; ?>">
                    </div>
                </div>
            </fieldset>
            <input class="formulario-submit--secundario" type="submit" value="Guardar">
        </form>
    </div>
    
</main>

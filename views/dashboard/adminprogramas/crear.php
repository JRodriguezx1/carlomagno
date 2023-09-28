<main class="crear-prog style-main">
    
    <h3>Registrar Programa</h3>
    <div class="btn">
        <a href="/admin/dashboard/admin_programas">Volver</a>
    </div>
    <div class="form-registro">
        <?php include __DIR__. "/../../templates/alertas.php"; ?>
        <form class="formulario" method="POST" action="/admin/dashboard/admin_programas/crear">
            
            <div class="contenedor-campos"> 
                <div class="formulario-campo">
                    <label class="formulario-label" for="nombre">Nombre</label>
                    <input class="formulario-input <?php echo isset($resaltarerror['nombre'])?'marcarerror':''; ?>" type="text" id="nombre" name="nombre" placeholder="Nombre del programa" required value="<?php echo $programa->nombre ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="codigo">Nº Codigo</label>
                    <input class="formulario-input" type="number" id="codigo" name="codigo" placeholder="codigo del programa" value="<?php echo $programa->codigo ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="niveleducativo">Nivel Educativo</label>
                    <input class="formulario-input" type="text" id="niveleducativo" name="niveleducativo" placeholder="Nivel del programa" required value="<?php echo $programa->niveleducativo ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="ciudad">Estado</label>
                    <select name="estado" required>
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div> 
                <fieldset class="niveles">
                    <legend>NIVELES</legend>
                    <div class="campo-btn-nivel">
                        <span class="btn_nivel">+</span>
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="nombrenivel">Nombre del nivel</label>
                        <input class="formulario-input" type="text" id="nombrenivel" name="niveles[nombrenivel1]" placeholder="Ej: I Semestre" required value="<?php echo $nivel->nombre ?? ''; ?>">
                    </div>    
                </fieldset>
                <!--
                <fieldset>
                    <legend>GRUPO</legend>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="año">Año</label>
                        <input class="formulario-input" type="number" min="2020" max="<?php echo date("Y");?>" id="año" name="año" placeholder="Año del grupo" required value="<?php echo $grupo->año ?? ''; ?>">
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="nombregrupo">Nombre</label>
                        <input class="formulario-input" type="text" id="nombregrupo" name="nombregrupo" placeholder="Nombre del grupo" required value="<?php echo $grupo->nombregrupo ?? ''; ?>">
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="detallegrupo">Detalle</label>
                        <input class="formulario-input" type="text" id="detallegrupo" name="detallegrupo" placeholder="Detalle del grupo" value="<?php echo $grupo->detallegrupo ?? ''; ?>">
                    </div>
                </fieldset>
                -->
            </div>
            
            <input class="formulario-submit--secundario" type="submit" value="Crear">
        </form>
    </div>

</main>
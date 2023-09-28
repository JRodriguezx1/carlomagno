
<main class="crear-oferta style-main">
    <h3>Registra la Oferta Academica</h3>
    <div class="btn">
        <a href="/admin/dashboard/gestionar_oferta">Volver</a>
    </div>
    <div class="form-oferta">
        <?php include __DIR__. "/../../templates/alertas.php"; ?>
        <form class="formulario" method="POST" action="/admin/dashboard/gestionar_oferta/nuevo_reg" enctype="multipart/form-data">
            
            <div class="estado">
                <label class="publicar">Publicar: </label>
                <label for="si">Si</label>
                <input id="si" type="radio" name="estado" value="1" <?php echo $oferta->estado=='1'?'checked':''; ?> required>
                <label for="no">No</label>
                <input id="no" type="radio" name="estado" value="0" <?php echo $oferta->estado=='1'?'checked':''; ?> required>
            </div>    

            <div class="formulario-campo">
                <label class="formulario-label" for="tipo">Nivel Educativo</label>
                <input class="formulario-input <?php echo isset($resaltarerror['tipo'])?'marcarerror':''; ?>" type="text" id="tipo" name="tipo" placeholder="Nivel de educacion" required value="<?php echo $oferta->tipo ?? ''; ?>">
                <label data-num="43" class="campo-contchart">43</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="nombre">Nombre del programa</label>
                <input class="formulario-input <?php echo isset($resaltarerror['nombre'])?'marcarerror':''; ?>" type="text" id="nombre" name="nombre" placeholder="nombre del programa" required value="<?php echo $oferta->nombre ?? ''; ?>">
                <label data-num="57" class="campo-contchart">57</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="descripcion">Descripcion del programa</label>
                <textarea name="descripcion" <?php echo isset($resaltarerror['descripcion'])?'marcarerror':''; ?>" cols="30" rows="4"><?php echo $oferta->descripcion ?? ''; ?></textarea>
                <label data-num="899" class="campo-contchart">899</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="modalidad">Modalidad</label>
                <input class="formulario-input" type="text" id="modalidad" name="modalidad" placeholder="modalidad" value="<?php echo $oferta->modalidad ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="duracion">Duracion</label>
                <input class="formulario-input" type="text" id="duracion" name="duracion" placeholder="duracion" value="<?php echo $oferta->duracion ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="jornada">Jornada</label>
                <input class="formulario-input" type="text" id="jornada" name="jornada" placeholder="jornada" value="<?php echo $oferta->jornada ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="horario">Horario</label>
                <input class="formulario-input" type="text" id="horario" name="horario" placeholder="horario" value="<?php echo $oferta->horario ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="ubicacion">Ubicacion</label>
                <input class="formulario-input" type="text" id="ubicacion" name="ubicacion" placeholder="ubicacion" value="<?php echo $oferta->ubicacion ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="matricula">Matricula</label>
                <input class="formulario-input" type="text" id="matricula" name="matricula" placeholder="matricula" value="<?php echo $oferta->matricula ?? ''; ?>">
                <label data-num="67" class="campo-contchart">67</label>
            </div>

            <div class="formulario-campo">
                <label class="formulario-label" for="imagen">imagen</label>
                <input class="formulario-input formulario-file" type="file" id="imagen" name="imagen">
            </div>

            <div class="formulario-campo">
                <label class="formulario-label" for="resolucion">Registro del programa</label>
                <input class="formulario-input" type="text" id="resolucion" name="resolucion" placeholder="resolucion" value="<?php echo $oferta->resolucion ?? ''; ?>">
                <label data-num="160" class="campo-contchart">160</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="titulo">Titulo que se otorga</label>
                <input class="formulario-input" type="text" id="titulo" name="titulo" placeholder="titulo" value="<?php echo $oferta->titulo ?? ''; ?>">
                <label data-num="80" class="campo-contchart">80</label>
            </div>
            
            <input class="formulario-submit--secundario" type="submit" value="Guardar">
        </form>
    </div>
    
</main>
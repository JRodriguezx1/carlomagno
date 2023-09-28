<main class="crear-oferta style-main">
    <h3>Registrar Curso</h3>
    <div class="btn">
        <a href="/admin/dashboard/gestionar_oferta">Volver</a>
    </div>
    <div class="form-oferta">
        <?php include __DIR__. "/../../templates/alertas.php"; ?>
        <form class="formulario" method="POST" action="/admin/dashboard/gestionar_oferta/crear_curso" enctype="multipart/form-data">
            
            <div class="estado">
                <label class="publicar">Publicar: </label>
                <label for="si">Si</label>
                <input id="si" type="radio" name="estado" value="1" required <?php echo $oferta->estado=='1'?'checked':''; ?> >
                <label for="no">No</label>
                <input id="no" type="radio" name="estado" value="0" required <?php echo $oferta->estado=='0'?'checked':''; ?> >
            </div>    

            <div class="formulario-campo">
                <label class="formulario-label" for="tipo">Nivel Educativo</label>
                <input class="formulario-input <?php echo isset($resaltarerror['tipo'])?'marcarerror':''; ?>" type="text" id="tipo" name="tipo" placeholder="Ej: Curso, Asistencia o Diplomado etc" required value="<?php echo $oferta->tipo ?? ''; ?>">
                <label data-num="20" class="campo-contchart">20</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="nombre">Nombre del curso</label>
                <input class="formulario-input <?php echo isset($resaltarerror['nombre'])?'marcarerror':''; ?>" type="text" id="nombre" name="nombre" placeholder="Nombre del curso" required value="<?php echo $oferta->nombre ?? ''; ?>">
                <label data-num="43" class="campo-contchart">43</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="area">Area de ocupacion</label>
                <input class="formulario-input <?php echo isset($resaltarerror['area'])?'marcarerror':''; ?>" type="text" id="area" name="area" placeholder="Ej: Area de la salud" required value="<?php echo $oferta->area ?? ''; ?>">
                <label data-num="30" class="campo-contchart">30</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="descripcion">Descripcion del curso</label>
                <textarea name="descripcion" <?php echo isset($resaltarerror['descripcion'])?'marcarerror':''; ?>" cols="30" rows="4"><?php echo $oferta->descripcion ?? ''; ?></textarea>
                <label data-num="499" class="campo-contchart">499</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="temario">Temario del curso</label>
                <textarea name="temario" <?php echo isset($resaltarerror['temario'])?'marcarerror':''; ?>" cols="30" rows="4"><?php echo $oferta->temario ?? ''; ?></textarea>
                <label data-num="299" class="campo-contchart">299</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="modalidad">Modalidad</label>
                <input class="formulario-input" type="text" id="modalidad" name="modalidad" placeholder="Ej: Presenial, Distancia o Virtual" value="<?php echo $oferta->modalidad ?? ''; ?>" required>
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="duracion">Duracion</label>
                <input class="formulario-input" type="text" id="duracion" name="duracion" placeholder="Ej: 3 Semanas" value="<?php echo $oferta->duracion ?? ''; ?>" required>
                <label data-num="43" class="campo-contchart">43</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="intensidad">intensidad</label>
                <input class="formulario-input" type="text" id="intensidad" name="intensidad_hrs" placeholder="ej: 40 horas" value="<?php echo $oferta->intensidad_hrs ?? ''; ?>" required>
                <label data-num="43" class="campo-contchart">43</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="lugar">Lugar</label>
                <input class="formulario-input" type="text" id="lugar" name="lugar" placeholder="Ej: Armenia" value="<?php echo $oferta->lugar ?? ''; ?>" required>
                <label data-num="67" class="campo-contchart">67</label>
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="imagen">imagen</label>
                <input class="formulario-input formulario-file" type="file" id="imagen" name="imagen">
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="titulo">Titulo que se otorga</label>
                <input class="formulario-input" type="text" id="titulo" name="titulo" placeholder="Ej: Cursó y aprobó la accion de formacion de programacion de pagias web " value="<?php echo $oferta->titulo ?? ''; ?>" required>
                <label data-num="97" class="campo-contchart">97</label>
            </div>
            
            <input class="formulario-submit--secundario" type="submit" value="Guardar">
        </form>
    </div>
    
</main>
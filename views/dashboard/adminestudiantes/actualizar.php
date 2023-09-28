<main class="admin-crear-actualizar style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Actualizar datos del estudiante</h3>
    <div class="btn">
        <a href="/admin/dashboard/admin_estudiantes">Volver</a>
    </div>
    <div class="form-registro">
        <form class="formulario" method="POST">    
            <div class="contenedor-campos"> 
                <div class="formulario-campo">
                    <label class="formulario-label" for="nombre">*Nombre</label>
                    <input  <?php echo ($session['admin'])?'':'readonly'; ?> class="formulario-input <?php echo isset($resaltarerror['nombre'])?'marcarerror':''; ?>" type="text" id="nombre" name="nombre" placeholder="Nombre del estudiante" required value="<?php echo $estudiante->nombre ?? ''; ?>">
                    <label data-num="33" class="campo-contchart">33</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="apellido">*Apellido</label>
                    <input class="formulario-input <?php echo isset($resaltarerror['apellido'])?'marcarerror':''; ?>" type="text" id="apellido" name="apellido" placeholder="Apellido del estudiante" required value="<?php echo $estudiante->apellido ?? ''; ?>">
                    <label data-num="33" class="campo-contchart">33</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="cedula">*Cedula</label>
                    <input class="formulario-input" type="number" id="cedula" name="cedula" placeholder="Cedula del estudiante" required value="<?php echo $estudiante->cedula ?? ''; ?>">
                    <label data-num="10" class="campo-contchart">10</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="fechanacim">Fecha de Nacimiento</label>
                    <input class="formulario-input" type="date" id="fechanacim" name="fechanacim" placeholder="Fecha de nacimiento del estudiante" value="<?php echo $estudiante->fecha_nacimiento ?? date('Y-m-d'); ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="ciudad">*Ciudad</label>
                    <input class="formulario-input" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required value="<?php echo $estudiante->ciudad ?? ''; ?>">
                    <label data-num="25" class="campo-contchart">25</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="direccion">*Direccion</label>
                    <input class="formulario-input" type="text" id="direccion" name="direccion" placeholder="Direccion de residencia" required value="<?php echo $estudiante->direccion ?? ''; ?>">
                    <label data-num="70" class="campo-contchart">70</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="email">*Email</label>
                    <input class="formulario-input" type="email" id="email" name="email" placeholder="Email del Estudiante" required value="<?php echo $estudiante->email ?? ''; ?>">
                    <label data-num="40" class="campo-contchart">40</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="telefono">*Telefono</label>
                    <input class="formulario-input" type="number" id="telefono" name="telefono" placeholder="Telefono de contacto" required value="<?php echo $estudiante->telefono ?? ''; ?>">
                    <label data-num="35" class="campo-contchart">35</label>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="sede">Sede</label>
                    <input class="formulario-input" type="text" id="sede" name="sede" placeholder="Sede de registro" value="<?php echo $estudiante->sede ?? ''; ?>">
                    <label data-num="30" class="campo-contchart">30</label>
                </div>
 
            </div>
            
            <input class="formulario-submit--secundario" type="submit" value="Guardar">
        </form>
    </div>

</main>
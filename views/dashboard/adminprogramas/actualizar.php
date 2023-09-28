<main class="editar-prog style-main">
    
    <h3>Editar Datos del Programa y Grupo</h3>
    <div class="btn"><a href="/admin/dashboard/admin_programas">Volver</a></div>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>

    <div class="contenido-prog-grupo">

        <form class="formulario" method="POST">    
            <div class="contenedor-campos"> 
                <input name="programa[id]" type="hidden" value="<?php echo $programa->id;  ?>">
                <div class="formulario-campo">
                    <label class="formulario-label" for="nombre">Nombre</label>
                    <input class="formulario-input <?php echo isset($resaltarerror['nombre'])?'marcarerror':''; ?>" type="text" id="nombre" name="programa[nombre]" placeholder="Nombre del programa" required value="<?php echo $programa->nombre ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="codigo">Nº Codigo</label>
                    <input class="formulario-input" type="number" id="codigo" name="programa[codigo]" placeholder="codigo del programa" required value="<?php echo $programa->codigo ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="niveleducativo">Nivel Educativo</label>
                    <input class="formulario-input" type="text" id="niveleducativo" name="programa[niveleducativo]" placeholder="Nivel del programa" required value="<?php echo $programa->niveleducativo ?? ''; ?>">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="selectestado">Estado</label>
                    <select id="selectestado" name="programa[estado]" required>
                        <option <?php echo $programa->estado=='activo'?'selected':''; ?> value="activo">Activo</option>
                        <option <?php echo $programa->estado=='inactivo'?'selected':''; ?> value="inactivo">Inactivo</option>
                    </select>
                </div> 
            </div>
            <div class="editar-grupo">
                <fieldset>
                    <legend>GRUPO</legend>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="selectgrupo"><input id="activar-input" type="checkbox" class="cambio-grupo">Cambiar datos de grupo </label>
                        <select id="selectgrupo" name="grupo[id]" disabled required>
                            <option value="" disabled selected>-- Seleccione Grupo --</option>
                            <?php foreach($grupos as $grupo):
                                if($grupo->nombrenivel->nombrenivel != "Final"){  ?>
                                <option id="selectoption" value="<?php echo $grupo->id; ?>" > <?php echo $grupo->nombregrupo.'-'.$grupo->nombrenivel->nombrenivel.'-'.$grupo->sede;  ?> </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="sede">Sede</label>
                        <select id="sede" name="grupo[idsede]" disabled required>
                            <option value="" disabled selected>-- Cambio de sede --</option>
                            <?php foreach($sedes as $sede):
                                if($sede->id != 1){  ?>
                                <option id="selectoption" value="<?php echo $sede->id; ?>" > <?php echo $sede->ciudad;  ?> </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>
                    <input name="grupo[idprograma]" type="hidden" id="idprograma" disabled value="<?php echo $programa->id;  ?>">
                    <div class="formulario-campo">
                        <label class="formulario-label" for="selectestadogrupo">Estado</label>
                        <select id="selectestadogrupo" name="grupo[estado]" disabled required>
                            <option  value="abierto">abierto</option>
                            <option  value="cerrado">cerrado</option>
                        </select>
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="nombregrupo">Nombre</label>
                        <input class="formulario-input" type="text" id="nombregrupo" name="grupo[nombregrupo]" placeholder="Nombre del grupo" disabled required value="">
                    </div>
                    <div class="formulario-campo">
                        <label class="formulario-label" for="detallegrupo">Detalle</label>
                        <input class="formulario-input" type="text" id="detallegrupo" name="grupo[detallegrupo]" placeholder="Detalle del grupo" disabled value="">
                    </div>
                    <div class="count_btn-elimgrupo">
                        <p>Estudiantes: <span class="estudiantesxgrupo"> </span></p>
                        <div class="btn-eliminargrupo"><a href="" ><i class="fa-solid fa-trash"></i></a></div>
                    </div>
                </fieldset>
                <input class="formulario-submit--secundario" name="update-programa" type="submit" value="Guardar">
            </div>
        </form>

        <div class="nuevo-registro"> <!--nuevo-grupo-->
            <div class="barra-nuevo-registro">
                <i class="fa-solid fa-bars"></i>
                <h4>Registrar Nuevo Grupo</h4>
            </div>
            <div class="form-nuevo-grupo desplegardiv">
                <form class="formulario" method="POST">

                    <div class="contenedor-niveles">
                        <label class="formulario-label" for="selectnivel"> Nivel Academico: </label>
                        <select id="selectnivel" name="id_nivel" required>
                            <option value="" disabled selected>-- Seleccione Nivel --</option>
                            <?php foreach($niveles as $nivel):
                                if($nivel->nombrenivel != 'Final'){  ?>
                                <option id="selectoption" value="<?php echo $nivel->id; ?>" > <?php echo $nivel->nombrenivel;  ?> </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>

                    <div class="contenedor-campos">
                        <input name="idprograma" type="hidden" value="<?php echo $programa->id;  ?>">
                        <div class="formulario-campo">
                            <label class="formulario-label" for="sede">Sede</label>
                            <select id="sede" name="idsede" required>
                                <option value="" disabled selected>-- Elegir ciudad --</option>
                                <?php foreach($sedes as $sede):
                                    if($sede->id != 1){  ?>
                                    <option id="selectoption" value="<?php echo $sede->id; ?>" > <?php echo $sede->ciudad;  ?> </option>
                                <?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="nombregrupo">Nombre</label>
                            <input class="formulario-input" type="text" id="nombregrupo" name="nombregrupo" placeholder="Nombre del grupo" required value="<?php echo $gruponew->nombregrupo ?? ''; ?>">
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="detallegrupo">Detalle</label>
                            <input class="formulario-input" type="text" id="detallegrupo" name="detallegrupo" placeholder="Detalle del grupo" value="<?php echo $gruponew->detallegrupo ?? ''; ?>">
                        </div>
                        <input class="formulario-submit--secundario" name="nuevo-grupo" type="submit" value="Crear Grupo">
                    </div>
                    
                </form>
            </div> <!-- fin form-nuevo-grupo -->  
        </div> <!--fin nuevo-grupo-->

        <div class="nuevo-registro"> <!--nuevo-nivel-->
            <div class="barra-nuevo-registro">
                <i class="fa-solid fa-bars"></i>
                <h4>Cambiar Nivel Academico</h4>
            </div>
            <div class="contenedor-form-niveles desplegardiv">
                
                <form class="formulario" method="POST"> <!-- Actualizar nivel -->
                    <p>Actualizar nivel del programa</p>
                    <div class="contenedor-niveles">
                        <label class="formulario-label" for="selectnivel"> Nivel Academico: </label>
                        <select id="selectnivel" name="id" required>
                            <option value="" disabled selected>-- Seleccione Nivel --</option>
                            <?php foreach($niveles as $nivel):
                                if($nivel->nombrenivel != 'Final'){  ?>
                                <option id="selectoption" value="<?php echo $nivel->id; ?>" > <?php echo $nivel->nombrenivel;  ?> </option>
                            <?php } endforeach; ?>
                        </select>
                    </div>
                    <div class="contenedor-campos">
                        <input name="id_programa" type="hidden" value="<?php echo $programa->id;  ?>">
                        <div class="formulario-campo">
                            <label class="formulario-label" for="nombrenivel">Nombre</label>
                            <input class="formulario-input inputnivel" type="text" id="nombrenivel" name="nombrenivel" placeholder="Nombre del nivel" required value="<?php echo $nivelnew->nombrenivel ?? ''; ?>">
                        </div>
                        <input class="formulario-submit--secundario" name="actualizar-nivel" type="submit" value="Actualizar">
                    </div> 
                </form>
                <form class="formulario" method="POST"> <!-- crear nivel -->
                    <p>Crea un nuevo nivel al programa</p>
                    <div class="contenedor-campos">
                        <input name="id_programa" type="hidden" value="<?php echo $programa->id;  ?>">
                        <div class="formulario-campo">
                            <label class="formulario-label" for="nombrenivel">Nombre</label>
                            <input class="formulario-input" type="text" id="nombrenivel" name="nombrenivel" placeholder="Nombre del nivel" required value="<?php echo $nivelnew->nombrenivel ?? ''; ?>">
                        </div>
                        <input class="formulario-submit--secundario" name="crear-nivel" type="submit" value="Crear nivel">
                    </div> 
                </form>
            </div> <!-- fin form-nuevo-nivel -->  
        </div> <!--nuevo-nivel-->

    </div>
</main>
<!--<script src="/build/js/apiprogramas.js" defer></script>-->
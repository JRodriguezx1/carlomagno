<main class="ver selectgrupo-crear-ver style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Detalle del estudiante</h3>
    <div class="btn">
        <a href="<?php echo $url; ///admin/dashboard/admin_estudiantes ?>">Volver</a>
    </div>
    <div class="contenedor-ver">
        <div class="filtro-datos"> 
            <div class="filtro-programa">
                <label class="formulario-label" for="selectmatricula">Programa</label>
                <select id="selectmatricula" required> 
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach($datos_estudiante as $element): //datos_estudiante es de la tabla estud_grupo ?>
                    <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $element->id; ?>" > <?php echo $element->nombreprograma; ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="nombre-programa">
                    <label ></label>
                    <span> </span>
                </div>
            </div>
            <div class="datos">
                <div class="basicos">
                    <p class="numreg">Registro Nº: <span><?php echo $registroinicial->id; ?></span></p>
                    <div class="basico"><p>Cedula: <span><?php echo $registroinicial->cedula; ?></span></p></div>
                    <div class="basico"><label for="">Nombre: <span><?php echo $registroinicial->nombre; ?></span></label></div>
                    <div class="basico"><p>Apellido: <span><?php echo $registroinicial->apellido; ?></span></p></div>
                    <div class="basico"><p>Sede Registro: <span><?php echo $registroinicial->sede; ?></span></p></div>
                    <div class="basico"><p>Fecha de Registro: <span><?php echo $registroinicial->fecha_registro; ?></span></p></div>
                    <div class="basico"><p>Telefono: <span><?php echo $registroinicial->telefono; ?></span></p></div>
                    <div class="basico"><p>Email: <span><?php echo $registroinicial->email; ?></span></p></div>
                </div>

                <div class="estado-estudiante">
                    <form class="formulario" method="POST">
                        <p>Acciones</p>
                        <div class="acciones-estudiantes">
                            <div class="formulario-campo">
                                <label class="formulario-label" for="selectcambioprograma"><input id="activar-cambioprograma" type="checkbox" class="cambio-programa">Cambio de Programa</label>
                                <select class="selectprograma" id="selectcambioprograma" disabled name="programa" required> <!-- name="programa" no esta en modelo estudiantes esta en modelo estud_prog como idprograma -->
                                    <option value="" disabled selected>-- Seleccione --</option>
                                    <?php foreach($programas as $programa):  ?>
                                        <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $programa->id; ?>" > <?php echo $programa->nombre ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="selectcambiogrupo">Seleccionar grupo </label>
                                <select class="selectgrupo" id="selectcambiogrupo" disabled name="idgrupo" required>
                                    <option value="" disabled selected>-- Seleccione Grupo --</option>   
                                <!-- se llena los grupos con js -->   
                                </select>
                            </div>
                        </div>
                        <div class="contenedor-campos">
                            <div class="formulario-campo">
                                <label class="formulario-label" for="fecha_inicio">Fecha de Inicio</label>
                                <input class="formulario-input" type="date" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="fecha_finalizacion">Fecha de Finalizacion</label>
                                <input class="formulario-input" type="date" id="fecha_finalizacion" name="fecha_fin">
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="nmatricula">Nª Matricula</label>
                                <input class="formulario-input" type="text" id="nmatricula" name="id" readonly value="">
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="nombrecoordinador">Registrado Por</label>
                                <input class="formulario-input" type="hidden" id="idcoordinador" name="idcolaborador" value="<?php echo $estudiante->idcolaborador ?? ''; ?>">
                                <input class="formulario-input" type="text" id="nombrecoordinador" disabled value="">
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="nivel">Nivel/Semestre</label>
                                <input class="formulario-input" type="text" id="nivel" disabled value="">
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="grupo">Grupo</label>
                                <input class="formulario-input" type="text" id="grupo" disabled value="">
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="estadomatricula">Estado</label>
                                <select name="estado" id="estadomatricula" required> <!-- name="programa" no esta en modelo estudiantes esta en modelo estud_prog -->
                                    <option value="" disabled selected>-- Seleccione --</option>
                                    <option value="Registrado">Registrado</option>
                                    <option value="En Curso">En Curso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Suspendido">Suspendido</option>
                                </select>
                            </div>
                            <div class="formulario-campo">
                                <label class="formulario-label" for="observacion">Observaciones</label>
                                <textarea id="observacion" name="observacion" cols="22" rows="3"></textarea>
                            </div>
                        </div>
                        <?php if($session['admin']): ?>
                        <input class="formulario-submit--secundario" name="actualizar-matricula" type="submit" disabled value="Guardar Cambios">
                        <?php endif; ?>
                    </form>

                </div>
            </div>   <!-- fin datos -->
        </div><!-- fin filtro-datos -->
            
        <div class="contenedor-barra">  <!--inicio crear nuevo-programa a estudiante-->
            <div class="barra-nuevo-registro">
                <i class="fa-solid fa-bars"></i>
                <h4>Registrar Nuevo Programa a Estudiante</h4>
            </div>
            <div class="form-nuevo-programa desplegardiv">
                <form class="formulario" method="POST">
                    <div class="contenedor-campos">
                        <input class="formulario-input" type="hidden" name="idestudiante" value="<?php echo $registroinicial->id; ?>">
                        <div class="formulario-campo">
                            <label class="formulario-label" for="selectnewprograma">* Programa</label>
                            <select class="selectprograma" id="selectnewprograma" name="programa" required> <!-- name="programa" no esta en modelo estudiantes esta en modelo estud_prog como idprograma -->
                                <option value="" disabled selected>-- Seleccione --</option>
                                <?php foreach($programas as $programa):
                                    foreach($datos_estudiante as $key => $element){
                                        if($programa->id != $element->idprograma){
                                            if(array_key_last($datos_estudiante) == $key): ?>
                                                <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $programa->id; ?>" > <?php echo $programa->nombre ?> </option>
                                            <?php endif;
                                        }else{ break; }
                                    }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="selectnewgrupo">* Seleccionar grupo </label>
                            <select class="selectgrupo" id="selectnewgrupo" disabled name="idgrupo" required>
                                <option value="" disabled selected>-- Seleccione Grupo --</option>   
                                <!-- se llena los grupos con js -->   
                            </select>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="fecha_inicio">* Fecha de Inicio</label>
                            <input class="formulario-input" type="date" id="fecha_inicio" name="fecha_inicio" required>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="newidcolaborador">Registrado Por</label>
                            <input class="formulario-input" type="text" id="newidcolaborador" disabled  value="<?php echo $session['nombre'] ?? ''; ?>">
                            <input class="formulario-input" type="hidden" id="idcoordinador" name="idcolaborador" value="<?php echo $session['id'] ?? ''; ?>">
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="newestado">Estado</label>
                            <select id="newestado" name="estado"> 
                                <option value="" disabled selected>-- Seleccione --</option>
                                <option value="Registrado">Registrado</option>
                                <option value="En Curso">En Curso</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Suspendido">Suspendido</option>
                            </select>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="newobservacion">Observaciones</label>
                            <textarea id="newobservacion" name="observacion" cols="22" rows="3"><?php echo $programa->observacion ?? ''; ?></textarea>
                        </div>

                    </div>
                    <input class="formulario-submit--secundario" name="registrar-programa-estudiante" type="submit" value="Registrar">
                </form>

            </div> <!-- fin form-nuevo-programa -->
                
        </div> <!--fin crear nuevo-programa a estudiante-->
            
    </div> <!-- fin contenedor-ver -->     
    
    
    <div class="contenedor-pagos">
        <div class="contenedor-barra">
            <div class="barra-nuevo-registro">
                <i class="fa-solid fa-bars"></i>
                <h4>Pagos</h4>
            </div>
            <div class="pagos desplegardiv">
                <div class="historial-pagos">
                    <p class="texto-historial-pagos">Historial de pagos del estudiante:</p>
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>Id Pago</th>
                                <th>Nª Matricula</th>
                                <th>Programa</th>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php foreach($pagos as $pago): ?> <!--$propiedades es un arreglo que contiene objetos-->
                            <tr> 
                                <td> <?php echo $pago->id ??''; ?> </td>
                                <td> <?php echo $pago->idmatricula ??''; ?> </td> <!-- este id tiene que ser de la tabla estud_grupo -->
                                <td> <?php echo $pago->nombreprograma ??''; ?> </td>
                                <td> <?php echo $pago->fecha ??''; ?> </td>
                                <td> <?php echo $pago->concepto ??''; ?> </td>
                                <td>$<?php echo $pago->monto ??''; ?> </td>
                                <td class="acciones-registro">
                                    <form id="eliminar-registro-pago" class="formulario" method="POST" action="/admin/dashboard/admin_estudiantes/eliminar_pago">
                                        <input name="id" type="hidden" value="<?php echo $pago->id ??''; ?>">
                                        <?php if($session['admin']): ?>
                                        <label for="<?php echo $pago->id; ?>"><i class="fa-solid fa-trash"></i></label>
                                        <div class="borrarpago"><input id="<?php echo $pago->id; ?>" type="submit"></div>
                                        <?php endif; ?>
                                    </form>
                                    <div class="printpago"><a href="/admin/dashboard/admin_estudiantes/print_pago?id=<?php echo $pago->id ??''; ?>" ><i class="fa-solid fa-print"></i></a> </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if($session['admin']): ?>
                <form class="formulario" method="POST" action="/admin/dashboard/admin_estudiantes/pagos">
                    <p class="texto-registrar-pagos">Registrar pago: </p>
                    <div class="contenedor-campos">
                        <div class="formulario-campo">
                            <label class="formulario-label" for="selectpagoidmatricula">Programa</label>
                            <select name="idmatricula" id="selectpagoidmatricula" required> 
                                <option value="" disabled selected>-- Seleccione --</option>
                                <?php foreach($datos_estudiante as $element): //datos_estudiante es de la tabla estud_grupo ?>
                                <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $element->id; ?>" > <?php echo $element->nombreprograma; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label">Matricula Nª: <span class="idmatricula"></span> </label>
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="fecha">Fecha de pago</label>
                            <input class="formulario-input" type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="monto">Monto</label>
                            <input class="formulario-input" type="number" max="999999999" id="monto" name="monto" value="<?php echo ''; ?>">
                        </div>
                        <div class="formulario-campo">
                            <label class="formulario-label" for="concepto">Concepto</label>
                            <textarea max="199" name="concepto" cols="22" rows="3" required><?php echo ''; ?></textarea>
                        </div>
                        <div class="btn-pago">
                            <input class="formulario-submit--secundario" type="submit" value="Registrar Pago">
                        </div>
                    </div>  
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>  
    

</main>
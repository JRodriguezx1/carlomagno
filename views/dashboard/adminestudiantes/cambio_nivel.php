<main class="cambio-niveles style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Administrador de Estudiantes</h3>

    <div class="btn">
        <a href="/admin/dashboard/admin_estudiantes">Volver</a>
    </div>

    <div class="filtro-niveles">
        <form class="formulario" method="POST" action="/admin/dashboard/admin_estudiantes/cambio_nivel">
            <div class="contenedor-campos">
                <div class="formulario-campo">
                    <label class="formulario-label" for="nivel_programas">Programa</label>
                    <select name="idprograma" id="nivel_programas" required> 
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php foreach($programas as $programa):  ?>
                        <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $programa->id; ?>" > <?php echo $programa->nombre; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="nivel_semestres">Niveles/Semestres</label>
                    <select name="idnivel" id="nivel_semestres" required> 
                        <option value="" disabled selected>-- Seleccione --</option>
                    </select>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="nivel_grupos">Grupo/Sede</label>
                    <select name="idgrupo" id="nivel_grupos" required> 
                        <option value="" disabled selected>-- Seleccione --</option>
                    </select>
                </div>
            </div>
            <input class="formulario-submit--secundario" type="submit" value="Consultar">   
        </form>
    </div>

    <div class="contenedor-estudiantes">
        <div class="datos-grupo">
            <input id="idsede" type="hidden" value="<?php echo $estudiantes[0]->idsede??'';?>">

            <form action="/admin/dashboard/admin_estudiantes/lista" method="POST">
                <!--<input type="hidden" name="idprograma" value="<?php //echo $estudiantes[0]->idprograma??'';?>"> -->
                <input type="hidden" name="idnivel" value="<?php echo $estudiantes[0]->idnivel??'';?>">
                <input type="hidden" name="idgrupo" value="<?php echo $estudiantes[0]->idgrupo??'';?>">
                <button type="submit" name="lista" class="lista">Lista</button>
            </form>
            <p class="texto-programa-nivel">Estudiantes de: <span> <?php echo $estudiantes[0]->programa??''?> - <?php echo $estudiantes[0]->nivel??''; ?> </span></p>
        </div>
        
        <form id="form-update-nivel" method="POST" action="/admin/dashboard/admin_estudiantes/aplicar_CN">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>id</th>
                        <th><i id="selectall" class="fa-solid fa-square-check"></i></th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <!--<th>Programa</th>
                        <th>Semestre</th>-->
                        <th>grupo/sede</th>
                        <th>estado</th>
                        <th class="accionesth">Detalle</th>
                    </tr>
                </thead>
                    
                <tbody>
                    <?php foreach($estudiantes as $estudiante): ?> 
                    <tr> 
                        <td><?php echo $estudiante->id ??''; ?> </td> <!-- este id es el id de la tabla estud_grupo o matricula -->
                        <td><input type="checkbox" name="matricula[]" value="<?php echo $estudiante->id; ?>" checked> </td>
                        <td><?php echo $estudiante->nombre.' '.$estudiante->apellido; ?> </td>
                        <td><?php echo $estudiante->cedula ??''; ?> </td>
                        <!--<td> <?php //echo $estudiante->programa ??''; ?> </td>
                        <td><?php //echo $estudiante->nivel ??''; ?> </td> -->
                        <td><?php echo $estudiante->grupo.' - ';?><span class="sede"><?php echo $estudiante->sede; ?></span> </td>
                        <td><?php echo $estudiante->estado ??''; ?> </td>
                        <td class="acciones-cn">
                            <div class=""><a href="/admin/dashboard/admin_estudiantes/ver?id=<?php echo $estudiante->id ??'';?>&nivel=1" ><i class="fa-solid fa-address-card"></i></a></div>              
                        </td> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="aplicar-cn">
                <select name="idnivel" id="nivel_semestres" required> 
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach($niveles as $nivel):
                        if($nivel->id != $estudiantes[0]->idnivel){  ?>
                    <option <?php //echo $propiedad->idvendedor === $programa->id ? 'selected' : '';  ?>  value="<?php echo $nivel->id; ?>" > <?php echo $nivel->nombrenivel; ?> </option>
                    <?php } endforeach; ?>
                </select>
                <select name="idgrupo" id="nivel_grupos" required> 
                    <option value="" disabled selected>-- Seleccione --</option>
                </select>
                <label class="update-nivel" for="update-nivel"><i class="fa-solid fa-right-to-bracket"></i></label>
                <input id="update-nivel" type="submit" value="Actualizar">
            </div>
        </form>
    </div>
    

</main>
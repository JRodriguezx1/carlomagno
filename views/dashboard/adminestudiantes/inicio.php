<main class="admin-estudiantes style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Administrador de Estudiantes</h3>

    <div class="acciones-registros">
        <div class="colum">
            <div class="btn"><a href="/admin/dashboard/admin_estudiantes/crear">Nuevo Registro</a> </div>
            <div class="acciones-especiales">
                <form id="filtro-personalizado" action="/admin/dashboard/admin_estudiantes/excel" method="POST">
                    <button id="filtro-personalizado" name="excel" class="excel">Excel</button>
                </form>
                <?php if($session['admin']): ?>
                <a class="cambio-semestre" href="/admin/dashboard/admin_estudiantes/cambio_nivel"><i class="fa-solid fa-folder-open"></i></a>
                <?php endif; ?>
            </div>  
        </div>

        <div class="colum">
            <div class="filtro-programas">
                <select name="filtro" id="selectprogramas" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach($programas as $programa):  ?>
                    <option value="<?php echo $programa->id; ?>" > <?php echo $programa->nombre; ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="cont-consultar">
                    <button id="filtros-personalizado">Busq... Siguiente</button>
                </div>
            </div>
        </div>

        <div class="colum">
            <form class="formulario-filtro" action="/admin/dashboard/admin_estudiantes/filtro?pagina=1" method="POST"> 
                <div class="filtro">
                    <label id="filtro" for="cedula">Cedula</label>
                    <input id="cedula" type="radio" name="filtro" value="cedula" required>
                    <label id="filtro" for="nombre">Nombre</label>
                    <input id="nombre" type="radio" name="filtro" value="estudiantes.nombre" required>
                </div>
                <input class="formulario-input" type="text" name="buscar" placeholder="buscar" required value="<?php echo $info[0]->buscar ?? ''; ?>">
                <label for="busqueda"><i class="lupa fa-solid fa-magnifying-glass"></i></label>
                <input id="busqueda" type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <table class="tabla">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Programa</th>
                <th>Nivel</th>
                <th>Sede</th>
                <th>estado</th>
                <th class="accionesth">Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            <?php foreach($estudiantes as $estudiante): ?> <!--$propiedades es un arreglo que contiene objetos-->
            <tr> 
                <td> <?php echo $estudiante->id ??''; ?> </td> <!-- este id es de la tabla estud_grupo -->
                <td> <?php echo $estudiante->nombre ??''; ?> </td>
                <td> <?php echo $estudiante->cedula ??''; ?> </td>
                <td> <?php echo $estudiante->programa ??''; ?> </td>
                <td> <?php echo $estudiante->nombrenivel ??''; ?> </td>
                <td> <?php echo $estudiante->ciudad ??''; ?> </td>
                <td> <?php echo $estudiante->estado ??''; ?> </td>
                <td class="acciones-registro">
                    <div class="ver-registro"><a href="/admin/dashboard/admin_estudiantes/ver?id=<?php echo $estudiante->id ??''; ?>" ><i class="fa-solid fa-eye"></i></a></div>
                    <form id="eliminar-registro-estudiante" class="formulario" method="POST" action="/admin/dashboard/admin_estudiantes/eliminar">
                        <input name="idestudiante" type="hidden" value="<?php echo $estudiante->idestudiante ??''; ?>">
                        <?php if($session['admin']): ?>
                        <div class="btn"><input type="submit" value="Borrar" > </div>
                        <?php endif; ?>
                    </form>
                    <div class="btn"><a href="/admin/dashboard/admin_estudiantes/actualizar?id=<?php echo $estudiante->idestudiante ??''; ?>" >Editar</a> </div>              
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php echo $paginacion; ?>

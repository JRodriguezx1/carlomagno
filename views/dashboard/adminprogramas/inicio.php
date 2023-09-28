<main class="admin-programas style-main">
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Administrador de Programas</h3>
    
    <div class="btn"><a href="/admin/dashboard/admin_programas/crear">Nuevo Programa</a></div>   

    <table class="tabla">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Nº registro</th>
                <th>Grupos</th>
                <th>estado</th>
                <th class="accionesth">Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            <?php foreach($programas as $programa): ?>
            <tr> 
                <td> <?php echo $programa->id ??''; ?> </td> 
                <td> <?php echo $programa->nombre ??''; ?> </td>
                <td> <?php echo $programa->codigo ??''; ?> </td>
                <td> 
                    <select id="programa-grupo">
                        <option value="" disabled selected> Grupo(s) </option>
                        <?php foreach($grupos as $grupo):  
                            if($programa->id === $grupo->idprograma):
                        ?>
                        <option> <?php echo $grupo->nombregrupo.'-'.$grupo->nivel.'-'.$grupo->sede;  ?> </option>
                        <?php endif;
                              endforeach; ?>
                    </select> 
                </td>
                <td> <?php echo $programa->estado ??''; ?> </td>
                <td class="acciones-registro">
                    <form id="eliminar-registro" class="formulario" method="POST" action="/admin/dashboard/admin_programas/eliminar">
                        <input name="id" type="hidden" value="<?php echo $programa->id ??'';  ?>">
                        <?php if($session['admin']): ?>
                        <div class="btn"><input type="submit" value="Borrar" > </div>
                        <?php endif; ?>
                    </form>
                    <div class="btn"><a href="/admin/dashboard/admin_programas/actualizar?id=<?php echo $programa->id ??''; ?>" >Editar</a> </div>              
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>
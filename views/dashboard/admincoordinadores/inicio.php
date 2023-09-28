<main class="admin-coordinadores style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Administrador de coordinadores</h3>

    <table class="tabla">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Password</th>
                <th class="accionesth">Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            <?php foreach($coordinadores as $coordinador): 
            if($coordinador->email != "julianlink123@hotmail.com"){   ?>
            <tr> 
                <td> <?php echo $coordinador->id ??''; ?> </td> 
                <td> <?php echo $coordinador->nombre ??''; ?> </td>
                <td> <?php echo $coordinador->apellido ??''; ?> </td>
                <td> <?php echo $coordinador->email ??''; ?></td>
                <td><?php echo $coordinador->admin==1?'Si':'No'; ?></td>
                <td class="password"> 
                    <form method="POST" action="/admin/dashboard/admin_coordinadores">
                        <input name="id" type="hidden" value="<?php echo $coordinador->id ??'';  ?>">
                        <input class="campo-pass" type="text" name="password" required> 
                        <input type="submit" name="cambiarpass" value="Actualizar">
                    </form> 
                </td>
                <td class="acciones-coordinador">
                    <form id="eliminar-users" class="formulario" method="POST" action="/admin/dashboard/admin_coordinadores">
                        <input name="id_eliminar" type="hidden" value="<?php echo $coordinador->id ??'';  ?>">
                        <div class="btn"><input type="submit" value="Eliminar" > </div>
                    </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </tbody>
    </table>
</main>
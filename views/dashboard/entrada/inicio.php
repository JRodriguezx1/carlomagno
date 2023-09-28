
<main class="inicio">
    <h2 class="heading-inicio">Fundacion Carlo Magno</h2>
    <div class="inicio-contenedor">
        <div class="tabla-contenedor">
            <?php foreach($info as $row): ?>
                <table class="tinfop">
                    <thead>
                        <tr>
                            <th>Informacion principal</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Direccion principal: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->direccion_p; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Telefono 1: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->tel1; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Telefono 2: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->tel2; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> whatsapp: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->whatsapp; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Nit: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->nit; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> facebook: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->facebook; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> instagram: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->instagram; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> youtube: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->youtube; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Informacion legal: </td> <!--td = columna en la tabla-->
                            <td> <?php echo $row->infolegal; ?> </td>
                        </tr>
                        <tr> <!--tr = fila en la tabla-->
                            <td class="descripcion"> Logo: </td> <!--td = columna en la tabla-->
                            <td class="logo-tabla"><img src="<?php echo "../../build/img/$row->logo";?>" alt="imagen logo"></td>
                        </tr>
                    </tbody>
                </table>
                <p>Ultima fecha de actualizacion: <?php echo $row->fecha; ?></p>
            <?php endforeach; ?>   
        </div> <!-- tabla-contenedor -->
        <div class="btn">
            <a href="/admin/dashboard/update-infobasic">Actualizar</a>
        </div>
    </div>
    
</main>
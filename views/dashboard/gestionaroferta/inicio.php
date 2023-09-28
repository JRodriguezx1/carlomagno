<main class="gestionar-oferta style-main">
    
    <h3>Gestion de Oferta Academica</h3>
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>

    <div class="btn"><!--<a href="/admin/dashboard/gestionar_programas/crear">Crear Programa</a>-->
                     <a href="/admin/dashboard/gestionar_oferta/nuevo_reg">Nuevo Registro</a>
                     <a href="/admin/dashboard/gestionar_oferta/crear_curso">Crear Cursos</a>
    </div>

    <table class="toferta">
        <thead>
            <tr>
                <th>id</th>
                <th>Titulacion</th>
                <th>Nombre</th>
                <th>publicado</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            <?php foreach($ofertas as $oferta): ?> <!--$propiedades es un arreglo que contiene objetos-->
            <tr> 
                <td> <?php echo $oferta->id ??''; ?> </td> 
                <td> <?php echo $oferta->tipo ??''; ?> </td>
                <td> <?php echo $oferta->nombre ??''; ?> </td>
                <td> <?php echo $oferta->estado==1?'Si':'No'; ?> </td>
                <td> <img class="imagen-tabla" src="<?php echo "/../../build/img/img-programas/$oferta->imagen";  ?>" alt="imagen tabla"> </td>
                <td>
                    <form id="eliminar-oferta" class="formulario" method="POST" action="/admin/dashboard/gestionar_oferta">
                        <input name="id" type="hidden" value="<?php echo $oferta->id ??'';  ?>">
                        <div class="btn"><input type="submit" value="Eliminar" > </div>
                    </form>
                    <div class="btn"><a href="/admin/dashboard/gestionar_oferta/actualizar?id=<?php echo $oferta->id ??''; ?>" >Actualizar</a> </div>              
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--
    <form action="/admin/dashboard/gestionar-programas" method="POST">
    
    </form>
    -->

    <h4 class="cursos">CURSOS: </h4>

    <table class="toferta">
        <thead>
            <tr>
                <th>id</th>
                <th>Titulacion</th>
                <th>Nombre</th>
                <th>publicado</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
            
        <tbody>
            <?php foreach($cursos as $curso): ?> <!--$propiedades es un arreglo que contiene objetos-->
            <tr> 
                <td> <?php echo $curso->id ??''; ?> </td> 
                <td> <?php echo $curso->tipo ??''; ?> </td>
                <td> <?php echo $curso->nombre ??''; ?> </td>
                <td> <?php echo $curso->estado==1?'Si':'No'; ?> </td>
                <td> <img class="imagen-tabla" src="<?php echo "/../../build/img/img-cursos/$curso->imagen";  ?>" alt="imagen tabla"> </td>
                <td>
                    <form id="eliminar-oferta" class="formulario" method="POST" action="/admin/dashboard/gestionar_oferta">
                        <input name="id_curso" type="hidden" value="<?php echo $curso->id ??''; ?>">
                        <div class="btn"><input type="submit" value="Eliminar" > </div>
                    </form>
                    <div class="btn"><a href="/admin/dashboard/gestionar_oferta/actualizar_curso?id=<?php echo $curso->id ??''; ?>" >Actualizar</a> </div>              
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

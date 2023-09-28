<main class="controladmin style-main">
    
    <h3>Panel de Control</h3>
    
    <div class="rectangulos">
        <div class="rectangulo">
            <div class="contenido-texto">
                <h2><?php echo $totalestudiantes; ?></h2>
                <p>Estudiantes</p>
            </div>
            <div class="contenido-img">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>
        <div class="rectangulo">
            <div class="contenido-texto">
                <h2><?php echo $totalprogramas; ?></h2>
                <p>Programas</p>
            </div>
            <div class="contenido-img">
                <i class="fa-solid fa-layer-group"></i>
            </div>
        </div>
        <div class="rectangulo">
            <div class="contenido-texto">
                <h2><?php echo $totalfuncionarios; ?></h2>
                <p>Funcionarios</p>
            </div>
            <div class="contenido-img">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>

    <div class="contenedor-comandos">
    
        <div class="tabla-estudiantes">
            <p>Ultimos Estudiantes</p>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Estado</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php foreach($ultimosestudiantes as $estudiante): ?>
                    <tr> 
                        <td> <?php echo $estudiante->estudiante->nombre ??''; ?> </td> 
                        <td> <?php echo $estudiante->estudiante->apellido ??''; ?> </td>
                        <td> <?php echo $estudiante->cedula ??''; ?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="comandos">
            <div class="comando">
                <a href="/admin/dashboard/entrada">
                    <i class="fa-solid fa-address-book"></i>
                    <p>Editar Entrada</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/editar_index">
                    <i class="fa-solid fa-file-pen"></i>
                    <p>Editar inicio</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/editar_nosotros">
                    <i class="fa-solid fa-file-signature"></i>
                    <p>Editar nosotros</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/editar_contacto">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <p>Editar contacto</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/contenido_fotografico">
                    <i class="fa-solid fa-images"></i>
                    <p>Galeria</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/crear_usuarios">
                    <i class="fa-solid fa-user-plus"></i>
                    <p>Crear usuarios</p>
                </a>   
            </div>
            <div class="comando">
                <a href="/admin/dashboard/gestionar_oferta">
                    <i class="fa-solid fa-list-ol"></i>
                    <p>Oferta academica</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/admin_programas">
                    <i class="fa-solid fa-bars-progress"></i>
                    <p>Admin programas</p>
                </a>
            </div>
            <div class="comando">
                <a href="/admin/dashboard/admin_estudiantes">
                    <i class="fa-sharp fa-solid fa-server"></i>
                    <p>Admin estudiantes</p>
                </a>
            </div>
            <div class="comando"></div>
            <div class="comando"></div>

        </div> <!-- fin comandos -->
    </div>

    <h4 class="titulo-graficas">GRAFICAS</h4>
    <div class="contenedor-graficas">
        <div class="dashboard-grafica1">
            <p>Estudiantes por programa</p>
            <canvas id="programas-grafica"></canvas>
        </div>
        <div class="dashboard-grafica2">
            <div>
                <div class="filtro-programas">  
                    <select id="grafica-selectprograma" required>
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php foreach($programas as $programa):  ?>
                        <option value="<?php echo $programa->id; ?>" > <?php echo $programa->nombre ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <canvas id="grupos-grafica"></canvas>
        </div>
    </div>

</main>
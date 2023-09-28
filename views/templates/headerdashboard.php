<div class="dashboard">
    
    <aside class="sidebar">
        <div class="logo">
            <h2>CarloMagno</h2>
            <div class="menu">
                <img src="/build/img/barras.svg" alt="menu-barra">
            </div>
            <div class="menux"> <!-- X q sierra el menu en dispositivo movil-->
                X
            </div>
        </div>
    <!-- <i class="fa-solid fa-screwdriver-wrench"></i> -->
        <h4>main</h4>
        <nav class="sidebar-nav"> <!-- el tamaño de las letras de los links <a> estan definidos en 1.6rem en gloables.scss -->
            <?php if($session['admin']): ?>
                <!--
            <a class="<?php //echo validar_string_url('/entrada')?'resaltar_menu':' '; ?>" href="/admin/dashboard/entrada"><i class="fa-solid fa-house"></i> entrada</a>  
            <a id="acordion" class="cambio" href="#"> <i class="fa-solid fa-file-signature"></i> Paginas</a>
            <div class="acordion <?php //echo validar_string_url('/editar_index')?'acordion-js':' '; echo validar_string_url('/editar_nosotros')?'acordion-js':' '; echo validar_string_url('/editar_contacto')?'acordion-js':' '; ?>">
                <a class="<?php //echo validar_string_url('/editar_index')?'resaltar_menu':' '; ?>" href="/admin/dashboard/editar_index"> <i class="fa-solid fa-file-pen"></i> Editar Inicio</a>
                <a class="<?php //echo validar_string_url('/editar_nosotros')?'resaltar_menu':' '; ?>" href="/admin/dashboard/editar_nosotros"> <i class="fa-solid fa-file-pen"></i> Editar Nosotros</a>
                <a class="<?php //echo validar_string_url('/editar_contacto')?'resaltar_menu':' '; ?>" href="/admin/dashboard/editar_contacto"> <i class="fa-solid fa-file-pen"></i> Editar Contacto</a>
            </div>
            <a class="<?php //echo validar_string_url('/contenido_fotografico')?'resaltar_menu':' '; ?>" href="/admin/dashboard/contenido_fotografico"> <i class="fa-solid fa-images"></i> Fotografias</a> -->
            <a class="<?php echo validar_string_url('/gestionar_oferta')?'resaltar_menu':' '; ?>" href="/admin/dashboard/gestionar_oferta"> <i class="fa-solid fa-list-ul"></i> Oferta Academica</a>
            <a class="<?php echo validar_string_url('/admin_programas')?'resaltar_menu':' '; ?>" href="/admin/dashboard/admin_programas"> <i class="fa-solid fa-laptop"></i> Admin Programas</a>
            <?php endif; ?>
            <a class="<?php echo validar_string_url('/admin_estudiantes')?'resaltar_menu':' '; ?>" href="/admin/dashboard/admin_estudiantes"> <i class="fa-sharp fa-solid fa-server"></i> Admin Estudiantes</a>
            <?php if($session['admin']): ?>
            <a class="<?php echo validar_string_url('/admin_coordinadores')?'resaltar_menu':' '; ?>" href="/admin/dashboard/admin_coordinadores"> <i class="fa-solid fa-address-book"></i> Admin Coordinadores</a>
            <a class="<?php echo validar_string_url('/crear_usuarios')?'resaltar_menu':' '; ?>" href="/admin/dashboard/crear_usuarios"> <i class="fa-solid fa-user-plus"></i> Crear Usuarios</a>
            <?php endif; ?>
            <a class="<?php echo validar_string_url('/perfil')?'resaltar_menu':' '; ?>" href="/admin/dashboard/perfil"><i class="fa-solid fa-user-pen"></i> Perfil</a>
        </nav>
        <div class="cerrar-sesion-mobile"> <!-- div q aplica solo en dispositivo movil  -->
            <p>Bienvenido: <span> <?php echo $session['nombre'] ?></span></p>
            <a class="cerrar-sesion" href="/logout">Cerrar Sesion</a>
        </div>
    </aside>
    
    <div class="barra-contenido">
       <!-- 
        <div class="barra-mobile">
            <h1>MenuDigital</h1>
            <div class="menu">
                <img id="mobile-menu" src="build/img/menu.svg" alt="imagen menu">
            </div>
        </div>
        -->

        <div class="barra">
            <p>hola: <span> <?php echo $session['nombre']; ?></span></p>
            <div class="acciones-barra">
                <a class="inicio" href="/admin/dashboard/controladmin"><i class="fa-solid fa-house"></i></a>
                <a class="cerrar-sesion" href="/logout">Cerrar Sesion</a>
            </div>
        </div>

        <div class="contenido">

        
<!--        </div> -->
<!--    </div> -->
<!--</div>   -->
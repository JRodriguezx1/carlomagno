<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos en Armenia, Quindío | Carlo Mago</title>
    <meta name="title" name="Bachillerato en Corto Tiempo Armenia, Quindío | Carlo Mago">
    <meta name="description" content="Gradúate de Bachiller en corto tiempo, matriculas asequibles y diplomas de certificados. Contamos con docentes capacitados. Nivela tu bachillerato ahora. ">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/">
    <!-- Critical CSS -->
  
    <!-- Fin de Critical CSS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Varela+Round&display=swap" rel="stylesheet"> -->
    <meta name="google-site-verification" content="xIv_-RaEZfJZMnrlFwBTjxIJc7ebWf2_oslKVewfzuY" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> 
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="icon" type="image/png" href="/build/img/logo.png"/>

    <meta name="google-site-verification" content="74Olmu2CiFE8tsNu4h7zAEqRS9epbFARp5cmp_rTjjk" />
</head> 
<body>

    <header class="cabezote">

        <div class="container-academico"> 
            <div class="info">
                <ul class="info-basica">
                    <li><img class="logo-cm" src="build/img/logo.png" alt="imagen logo CM"></li>
                    <li><a href="/contacto"><img src="build/img/icons-ubicacion.png" alt="icono de ubicación"></a><p>(+57)<?php echo $info->tel1; ?></p></li>
                    <li><img src="build/img/icons-email.png" alt="icono de email">info@fundacioneducativacarlomagno.com.co</li>
                    <li><p>NIT: <?php echo $info->nit; ?></p></li>
                </ul>
                <div class="rrss">
                    <a href="<?php echo $info->facebook; ?>" target="_blank"><img src="build/img/icons-facebook-f.svg" alt="img-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" target="_blank"><img src="build/img/icons-instagram.svg" alt="img-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" target="_blank"><img src="build/img/icons-youtube.svg" alt="img-youtube"></a>
                </div>
            </div>
            
            <div class="barra-header">  <!--barra superior-->
                <div class="column-logo">
                    <a href="index.html"><img src="build/img/logoazulpng1.png" alt="logo-pagina">
                    </a>
                </div> <!--logo de carlo magno-->
                
                <div class="movil-menu"> <!----boton menu 3 lineas horizontales----- clase soloindex se utiliza en app.js para aplicar transparencia a barra cunado se presiona el btn menu -->
                    <img src="build/img/barras.svg" alt="imgen barra">
                </div>

                <div class="column-nav">
                    <nav>
                        <a href="/">Inicio</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/estudiantes">Estudiantes</a>
                        <a href="/oferta_academica">Oferta Académica</a>
                        <a href="/galeria">Galeria</a>
                        <a href="/contacto">Contacto</a>
                    </nav>
                </div> 
            </div>  <!-- cierre de la barra superior -->    
        </div>  <!--fin contaider y hasta aqui biene el background css bkg en js--> 

    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=3168476702" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>

    <div class="detallecurso">
        <div class="nombrecurso">
            <span><img src="build/img/graduacion.png" alt=""></span>
            <h2><?php echo $curso->nombre; ?></h2>
        </div>
        <div class="contenedor">
            <div class="detallecurso-contenido">
                <div class="img-temario">
                    <div class="contenedor-img">
                        <div class="detallecurso-img">
                            <img src="build/img/img-cursos/<?php echo $curso->imagen; ?>" alt="">
                        </div>
                    </div>
                    <div class="detallecurso-temario">
                        <div class="temario-contenido">
                            <h3>TEMARIO</h3>
                            <h4><?php echo $curso->temario; ?></h4>
                            
                        </div>
                    </div>
                </div>
                <h3 class="tt-caracteristicas">CARACTERISTICAS DE ESTE CURSO</h3>
                <div class="caracteristicas">
                    <div class="caracteristica">
                        <img src="build/img/calendario.png" alt="">
                        <h3>Duracion</h3>
                        <p><?php echo $curso->duracion; ?></p>
                    </div>
                    <div class="caracteristica">
                        <img src="build/img/intensidad.png" alt="">
                        <h3>Intensidad</h3>
                        <p><?php echo $curso->intensidad_hrs; ?></p>
                    </div>
                    <div class="caracteristica">
                        <img src="build/img/lugar.png" alt="">
                        <h3>Lugar</h3>
                        <p>Sede: <?php echo $curso->lugar; ?></p>
                    </div>
                    <div class="caracteristica">
                        <img src="build/img/modalidad.png" alt="">
                        <h3>Modalidad</h3>
                        <p><?php echo $curso->modalidad; ?></p>
                    </div>
                </div>
                <div class="descripcion">
                    <h3>DESCRIPCION</h3>
                    <p><?php echo $curso->descripcion; ?></p>
                </div>
                <div class="tt-curso">
                    <h3>TITULO QUE SE OTORGA</h3>
                    <p><?php echo $curso->titulo; ?></p>
                </div>

            </div>
        </div>

        <div class="nombrecurso">
            <span><img src="build/img/graduacion.png" alt=""></span>
            <h2>Estas listo para Vivir esta experiencia? </h2>
        </div>

        <div class="detallecurso-info">
            <div class="contenedor">

                <h2 class="heading-info">Solicita Mas Informacion</h2>
                <p class="text-info">Contáctanos a través de los siguientes canales y con gusto te atenderemos.</p>
                
                <div class="info-contenido">
                    <div class="info">
                        <img src="build/img/2.png" alt="">
                        <h4>Visitanos</h4>
                        <p>Visitanos en nuestras sedes Nacionales</p>
                        <label><a href="/contacto">DIRECCIONES</a></label>
                    </div>
                    <div class="info">
                        <img src="build/img/3.png" alt="">
                        <h4>LLamanos</h4>
                        <p>solicita informacion a traves de nuestra linea de contacto</p>
                        <label>3168476702</label>
                    </div>
                    <div class="info">
                        <img src="build/img/3.png" alt="">
                        <h4>Escribenos</h4>
                        <p>solicita informacion a traves de nuestro whatsapp</p>
                        <label><a href="https://api.whatsapp.com/send?phone=3168476702" rel="nofollow" target="_blank">whatsapp</a></label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="build/js/app_cm.js"></script>
</body>

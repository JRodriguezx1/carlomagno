<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Técnico Auxiliar Contable - Administrativo | Armenia Quindío</title>
    <meta name="title" name="Técnico Auxiliar Contable - Administrativo | Armenia Quindío">
    <meta name="description" content="Gradúate de Auxiliar contable y administrativo, con los personal capacitado | Técnico en Sistemas - Redes Energía Eléctricas | Prepárate para el futuro ahora.">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/galeria">

    <title>CarloMagno/Nosotros</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="icon" type="image/png" href="/build/img/logo.png"/>
</head>
<body>

    <header class="cabezote">

        <div class="container nosotros">
          
            <div class="info">
                <ul class="info-basica">
                    <li><img class="logo-cm" src="build/img/logo.png" alt="imagen logo Fundación Carlo Magno"></li>
                    <li><a href="/contacto"><img src="build/img/icons-ubicacion.png" alt="icono de ubicación"></a><p>(+57)<?php echo $info->tel1; ?></p></li>
                    <li><img src="build/img/icons-email.png" alt="icono de email">info@fundacioneducativacarlomagno.com.co</li>
                    <li><p>NIT: <?php echo $info->nit; ?></p></li>
                </ul>
                <div class="rrss">
                    <a href="<?php echo $info->facebook; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-facebook-f.svg" alt="img-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-instagram.svg" rel="nofollow" alt="img-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-youtube.svg" alt="img-youtube"></a>
                </div>
            </div>
            
            <div class="barra-header">  <!--barra superior-->
                <div class="column-logo">
                    <a href="/"><img loading="lazy" src="build/img/logoazulpng1.png" alt="logo-pagina"></a></div> <!--logo de carlo magno-->
                <div class="movil-menu"> <!----boton menu 3 lineas horizontales----->
                    <img loading="lazy" src="build/img/barras.svg" alt="imagen barra">
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

            <div class="img-contacto header-contacto">
                <div class="contacto-header">
                    <h2>Galeria</h2>
                </div>
            </div>
        </div>    
    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->tel1; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
        <?php foreach($fotos as $foto): ?>
            <div class="swiper-slide">
                <img src="build/img/Fotos CarloMagno/<?php echo $foto->nombreimg; ?>" alt="<?php echo $foto->titulo??''; ?>">
            </div>    
        <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="build/js/app_cm.js"></script>
</body>

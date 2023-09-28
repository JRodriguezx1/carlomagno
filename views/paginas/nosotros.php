<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradúate en Auxiliar de Enfermería | Quienes somos Fundación</title>
    <meta name="title" name="Gradúate en Auxiliar de Enfermería | Quienes somos Fundación">
    <meta name="description" content="La Fundación Educativa Carlo Magno, es una entidad sin ánimo de lucro, comprometida comprometida en la formación integarl de jóvenes y adultos. Conoce Más.">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/nosotros.php">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Varela+Round&display=swap" rel="stylesheet">
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
                    <a href="<?php echo $info->facebook; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-facebook-f.svg" alt="icono-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-instagram.svg" alt="icono-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-youtube.svg" rel="nofollow" alt="icono-youtube"></a>
                </div>
            </div>
            
            <div class="barra-header">  <!--barra superior-->
                <div class="column-logo">
                    <a href="/"><img src="build/img/logoazulpng1.png" alt="Logo Pagina Fundación CM"></a></div> <!--logo de carlo magno-->
                <div class="movil-menu"> <!----boton menu 3 lineas horizontales----->
                    <img loading="lazy" src="build/img/barras.svg" alt="imagen barra">
                </div>
                <div class="column-nav">
                    <nav>
                        <a href="/">Inicio</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/estudiantes">Estudiantes</a>
                        <a href="/oferta_academica">Oferta Academica</a>
                        <a href="/galeria">Galeria</a>
                        <a href="/contacto">Contacto</a>
                    </nav>
                
                </div> 
            </div>  <!-- cierre de la barra superior -->

            <div class="img-contacto header-contacto">
                <div class="contacto-header">
                    <h2>Quienes Somos</h2>
                </div>
            </div>
        </div>    
    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=<?php echo '57'.$info->whatsapp; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>
    
    <main class="contenido-principal contenedor">
        <div class="contenido-historia">
            <div class="imagen-estudiante">
                <img loading="lazy" src="build/img/estudiantesgrupo.png" alt="Estudiantes - Grupo">
            </div>
            
            <div class="bloque-historia">
                <h2 class="texto-bienvenida">Bienvenidos <span>Fundacion Educativa Artistica y Cultural CarloMagno</span></h2>
                <img loading="lazy" class="title-lineal" src="build/img/title-02.png" alt="viñeta decorativa">
                <div class="bloque-texto">
                    <p><?php echo $infonosotros->bienvds ?? ''; ?></p>
                </div> 
            </div>
        </div>

        <div class="acceso-rapido">
            <div class="acceso-texto">
                <h2>Accesos Directos</h2>
                <p>Encuentra aquí más información</p>
            </div>
            <div class="bloque-acceso-rapido">
                <a class="contenido-enlace " href="/mision">
                    <div class="contenido-bloque-acceso contenido-bloque">
                        <img loading="lazy" src="build/img/mision.png" alt="imagen mision">
                        <p>Misión</p>
                    </div>
                </a>
                <a class="contenido-enlace" href="/vision">
                    <div class="contenido-bloque-acceso1 contenido-bloque">
                        <img loading="lazy" src="build/img/vision.png" alt="imagen vision">
                        <p>Visión</p>
                    </div>
                </a>
                <a class="contenido-enlace" href="/objetivo">
                    <div class="contenido-bloque-acceso contenido-bloque">
                        <img loading="lazy" src="build/img/objetivo.png" alt="imagen objetivo">
                        <p>Objetivos</p>
                    </div>
                </a>
                <a class="contenido-enlace" href="/biografia">
                    <div class="contenido-bloque-acceso1 contenido-bloque">
                        <img loading="lazy" src="build/img/historia.png" alt="imagen biografia">
                        <p>Biografía</p>
                    </div>
                </a>
            </div>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="build/js/app_cm.js"></script>


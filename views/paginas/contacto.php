<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seguridad Ocupacional - Atención Integral | Armenia Quindío</title>
    <meta name="title" name="Seguridad Ocupacional - Atención Integral | Armenia Quindío">
    <meta name="description" content="Educación de calidad, tenemos las carreras más demandadas del mercado. Nivela tu bachillerato, prepárate y formar tu futuro. Carreras técnicas | Entra y conoce">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/contacto">


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
                    <a href="<?php echo $info->facebook; ?>" rel="nofollow"  target="_blank"><img src="build/img/icons-facebook-f.svg" alt="img-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-instagram.svg" alt="img-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" rel="nofollow"  target="_blank"><img src="build/img/icons-youtube.svg" rel="nofollow" alt="img-youtube"></a>
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
                    <h2>Contacto</h2>
                </div>
            </div>
        </div>    
    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->tel1; ?>" rel="nofollow"  target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>

    <section class="contenedor bloque-info">
        <div class="contacto-info">
            <div class="contenido-formulario1">
                <div class="contacto">
                    <h3>Informate YA! <span>No dude en ponerse en contacto con nosotros.</span></h3>
                    <form class="formulario" action="https://formsubmit.co/59b1b6ab4ce37a156442732b039d00d9" method="POST">
                        <input name="Nombre" type="text" placeholder="Tu Nombre" required>
                        <input name="Telefono" type="text" placeholder="Telefono" required>
                        <input name="Ciudad" type="text" placeholder="Ciudad" required>
                        <input name="Email" type="email" placeholder="E-mail" required>
                        <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                        <input type="submit">

                        <input type="hidden" name="_next" value="https://fundacioneducativacarlomagno.com.co/contacto">
                        <input type="hidden" name="_captcha" value="false">
                    </form>
                </div>
            </div>

            <div class="bloque-direccion">
                <div class="direccion">
                    <div class="icon-contacto">
                        <img loading="lazy" src="build/img/2.png" alt="icon-contacto">
                    </div>
                    <div class="info-direccion">
                        <h3>Dirección</h3>
                        <p><?php echo $contacto->direccion ??''; ?></p>
                    </div>
                </div>
                    
                <div class="direccion">
                    <div class="icon-contacto">
                        <img loading="lazy" src="build/img/3.png" alt="icon-contacto">
                    </div>
                    <div class="info-direccion">
                        <h3>Contacto</h3>
                        <p><?php echo $contacto->contacto ??''; ?></p>
                        <p>Email: info@fundacioneducativacarlomagno.com.co</p>
                    </div>
                </div>

                <div class="direccion">
                    <div class="icon-contacto">
                        <img loading="lazy" src="build/img/4.png" alt="icon-contacto">
                    </div>
                    <div class="info-direccion">
                        <h3>Horario Laboral</h3>
                        <p><?php echo $contacto->horario ??''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="maps">
            <hr> <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7954.596097032959!2d-75.664972!3d4.540269!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f455710673af%3A0x457faea368c00e84!2sCra.%2014%20%235-63%2C%20Armenia%2C%20Quind%C3%ADo!5e0!3m2!1ses-419!2sco!4v1662923252194!5m2!1ses-419!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="build/js/app_cm.js"></script>
</body>

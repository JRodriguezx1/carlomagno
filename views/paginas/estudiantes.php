<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Técnico en Servicios Farmacéuticos | Armenia Quindío</title>
    <meta name="title" name="Técnico en Servicios Farmacéuticos | Armenia Quindío">
    <meta name="description" content="Estudia con nosotros, te ayudamos a cumplir tus sueños, profesionales con ética y responsabilidad | Armenia Quindío. Entra y conoce las ofertas académicas.">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/estudiantes.php">

    <title>CarloMagno</title>
    <link rel="icon" type="image/png" href="/build/img/logo.png"/>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="cabezote">

        <div class="container-academico">
          
            <div class="info">
                <ul class="info-basica">
                    <li><img class="logo-cm" src="build/img/logo.png" alt="imagen logo fundacioncarlomagno"></li>
                    <li><a href="/contacto"><img src="build/img/icons-ubicacion.png" rel="nofollow" alt="icono de ubicación"></a><p>(+57)<?php echo $info->tel1; ?></p></li>
                    <li><img src="build/img/icons-email.png" alt="icono de email">info@fundacioneducativacarlomagno.com.co</li>
                    <li><p>NIT: <?php echo $info->nit; ?></p></li>
                </ul>
                <div class="rrss">
                    <a href="<?php echo $info->facebook; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-facebook-f.svg" alt="img-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-instagram.svg" alt="img-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-youtube.svg" rel="nofollow" alt="img-youtube"></a>
                </div>
            </div>
            
            <div class="barra-header">  <!--barra superior-->
                <div class="column-logo"><a href="/"><img loading="lazy" src="build/img/logoazulpng1.png" alt="logo-pagina"></a></div> <!--logo de carlo magno-->
                
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
        </div>  <!--fin contaider y hasta aqui biene el background css bkg en js--> 
    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->whatsapp; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>

    <main class="estudiantes contenedor">
        <h1>Área de Consulta Académica</h1>
        <section class="estudiantes-contenido">
            <aside class="informacion-sidebar">
                <h3>Información Contacto</h3>
                <h4>Consulta Académica</h4>
                <p>fundacioncarlomagnoa@gmail.com</p>
                <p>Teléfono: <span class="rq"><?php echo $info->tel1; ?></span></p>
                <p>Sede Principal:</p>
                <p class="rq"><?php echo $info->direccion_p; ?></p>
                <!-- <p>Armenia - Quindío</p> -->
                <h4>Visite Nuestras Redes</h4>
                <a href="<?php echo $info->facebook; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-facebook-f.svg" alt="rs-facebook"></a>
                <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-instagram.svg" alt="rs-instagram"></a>
                <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->whatsapp; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-azuloscuro.png" alt="rs-whatsapp"></a>
            </aside>
            <div class="consulta-academico">
                <div class="bg-consulta-academica">
                    <img loading="lazy" src="build/img/logoazulpng1.png" alt="Logo Fundación Carlo Magno">
                </div>
                <h2>Sistema de consulta académica</h2>
                <div class="texto-consulta">
                    <p>Ingrese su Número de Identificación* y oprima el botón Consultar, para obtener su estado académico</p>
                </div>
                <form method="POST" action="/estudiantes">
                    <div class="estudiantes-campo">
                        <label for="cc">Número de identificación:</label>
                        <input id="cc" type="number" name="cedula" required>
                    </div>
                    <div class="estudiantes-campo">
                        <input type="submit" value="Consultar">
                    </div>
                </form>
                
                <?php if(gettype($registros)=='array'): ?>
                <div class="result-consulta">
                    <p class="datos-estudiantes">NOMBRE: <span><?php echo $estudiante->nombre.' '.$estudiante->apellido; ?></span>  CEDULA: <span><?php echo $estudiante->cedula; ?></span> </p>
                    <?php foreach($registros as $registro): ?>
                    <p>- <?php echo $registro->nombreprograma; ?>: <span><?php echo $registro->estado; ?></span> - <?php echo ( $registro->estado=="Finalizado")?'':$registro->nivel; ?> </p>
                    <?php endforeach; ?>
                </div>
                <?php endif;  ?>

            </div>
        </section>
        <div class="resultado-academico">
            <h3></h3>
        </div>
    </main>


    <script src="build/js/app_cm.js"></script>
</body>
</html>
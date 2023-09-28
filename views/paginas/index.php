
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachillerato en Corto Tiempo Armenia, Quindío | Carlo Mago</title>
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
    <!-- evitar la cache -->
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <!-- fin evitar la cache -->

    <meta name="google-site-verification" content="74Olmu2CiFE8tsNu4h7zAEqRS9epbFARp5cmp_rTjjk" />
</head> 

<body class="hidden" id="hidden">
    <!-- Preloader -->
    <div class="centrado" id="onload">
        
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
        
        <div class="bloque-historia1">
            <h2 class="texto-bienvenida-loader">Portal Web <span>Fundación Carlo Magno</span></h2>
        </div>
    </div>


    <header class="cabezote">
        <div class="bkg">
            
        </div>

        <div class="container">
          
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
                    <a href="/"><img src="build/img/logoazulpng1.png" alt="logo-pagina">
                    </a>
                </div> <!--logo de carlo magno-->
                
                <div class="movil-menu soloindex"> <!----boton menu 3 lineas horizontales----- clase soloindex se utiliza en app.js para aplicar transparencia a barra cunado se presiona el btn menu -->
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

            <!-- flechas de navegacion de la s imagenes del background-->
            <div class="bkg-flechas-sliders">
                <div class="contenedor sliders-bkg">
                    <img id="izq" src="build/img/icons-atrás-blanco-100.png" alt="flecha hacia atras">  <!-- felcha izquierda del slier del header-->
                    <h2 id="eslogan"><?php echo $infoidx->etxb1;?><span><?php echo $infoidx->etxv1;?></span> <?php echo $infoidx->etxb2;?> <span><?php echo $infoidx->etxv2;?></span> </h2>
                    <img id="der" src="build/img/icons-adelante-blanco-100.png" alt="icono adelante blanco">  <!-- felcha derecha del slier del header-->
                </div>
            </div>
        </div>  <!--fin contaider y hasta aqui biene el background css bkg en js--> 
        
        <div class="contenido-secciones">
            <div class="contenedor secciones-header">

                <div id="a" class="seccion-header">  <!-- rectangulo oscuro con icono verde-->     
                    <img src="build/img/icons-diploma-verde.png" alt="imgsec1">
                    <div><a href="#bachillerato_cademico"><h4>Bachillerato Académico</h4>ver más</a></div>     
                </div>

                <div id="b" class="seccion-header">
                    <img src="build/img/icons-persona2.png" alt="imgsec2">
                    <div><a href="#pqnosotros"><h4>+Beneficios para ti</h4>ver más</a></div>
                </div>

                <div id="c" class="seccion-header">
                    <img src="build/img/icons-silaba-verde.png" alt="imgsec3">
                    <div><a href="/estudiantes"><h4>Consulta tu Registro Académico</h4>ver más</a></div> 
                </div>

            </div>
        </div>  <!-- fin contenido-secciones -->

    </header>  <!-- fin del header total-->

    <section class="banda1">   
        <div class="contenedor line-seudoelement">
            <h3><?php echo $infoidx->txfhb1;?></h3>
            <p><span><?php echo $infoidx->txfha1;?></span> <?php echo $infoidx->txfhb2;?> <span><?php echo $infoidx->txfha2;?></span></p>
        </div>
    </section>

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=<?php echo '57'.$info->whatsapp; ?>" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="icono de whatsapp"></a>
    </div>


    <section id="slidercarreras" class="carreras">
        <h4>Carreras Técnicas y Diplomados <span id="maquina-de-escribir">Especializadas para ti.</span></h4>
        <!--hacer 2 clumnas imagen y texto-->
        <div class="contenedor slider-container"> <!-- maqueta tarjetas del slider-->
       

            <div class="tarjetas">

                <div class="tarjeta" id="letfmax" data-flechas="letf">
                   <div class="imagen imagen-a">
                        <img loading="lazy" src="build/img/enfermeria1.jpg" alt="imagen de criminalistica">
                   </div>
                   <div class="descrpcion-slider">
                       <a class="slider_cursos" href="#cursos">CURSOS</a>
                       <h4 class="nombre">Auxiliar de Enfermería</h4>
                       <a href="/oferta_academica?id=1" class="btn-slider">Ver más</a>
                   </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-c">
                        <img loading="lazy" src="build/img/ingles.jpg" alt="imagen de enfermeria">
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Ingles <span class="Ningles">A1 - B2</span></h4>
                        <a href="/oferta_academica?id=3" class="btn-slider">Ver más</a>
                    </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-d">
                        <img loading="lazy" src="build/img/bachiller.jpg" alt="imagen de bachiller">
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Nivelación Bachiller</h4>
                        <a href="/oferta_academica?id=4" class="btn-slider">Ver más</a>
                    </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-b">
                        <img loading="lazy" src="build/img/farmaceutico.jpg" alt="imagen de biblioteca">
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Servicios Farmaceuticos</h4>
                        <a href="/oferta_academica?id=2" class="btn-slider">Ver más</a>
                    </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-e">
                        <img loading="lazy" src="build/img/administrativo.jpg" alt="imagen de odontología">  
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Auxiliar Contable</h4>
                        <a href="/oferta_academica?id=5" class="btn-slider">Ver más</a>
                    </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-g">
                        <img loading="lazy" src="build/img/seguridad-en-el-trabajo.jpg" alt="seguridad en el trabajo">
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Seguridad y Salud en el Trabajo</h4>
                        <a href="/oferta_academica?id=7" class="btn-slider">Ver más</a>
                    </div>
                </div>

                <div class="tarjeta">
                    <div class="imagen imagen-f">
                        <img loading="lazy" src="build/img/biblioteca.jpg" alt="imagen de electricista">  
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Auxiliar Administrativo</h4>
                        <a href="/oferta_academica?id=6" class="btn-slider">Ver más</a>
                    </div>
                </div>
 <!--
                <div class="tarjeta" id="rightmax" data-flechas="right">
                    <div class="imagen imagen-h">
                        <img loading="lazy" src="build/img/tecnico en informatica.jpg" alt="tecnico en informática">
                    </div>
                    <div class="descrpcion-slider">
                        <a class="slider_cursos" href="#cursos">CURSOS</a>
                        <h4 class="nombre">Técnico en Informática</h4>
                        <a href="#" class="btn-slider">Ver más</a>
                    </div>
                </div>
 -->
            </div> <!-- fin tarjetas -->

            <div id="cursos" id="bachillerato_cademico" class="flechas-atras-adelante">
                <div class="flecha-izq"> <img loading="lazy" src="build/img/icons-atrás-64.png" alt="flecha-atras"> </div>
                <div class="flecha-der"> <img loading="lazy" src="build/img/icons-adelante-64.png" alt="flecha-adelante"> </div>
            </div>
        </div> <!-- fin slider container-->
    </section>


    <div class="cursos">
        <div class="contenedor">
            <h2><?php echo $infoidx->ttcurso;?></h2>
            <span class="cursos-año">2023</span>
            <div class="cursos-contenido">

                <?php foreach($cursos as $curso): ?>
                    <?php if($curso->estado == 1){ ?>
                    <div class="curso">
                        <div class="curso-img">
                            <a href="/detalle_curso?id=<?php echo $curso->id; ?>"><img src="build/img/img-cursos/<?php echo $curso->imagen; ?>" alt=""></a>
                        </div>
                        <div class="curso-texto">
                            <h4><?php echo $curso->area; ?></h4>
                            <p><?php echo $curso->nombre; ?></p>
                            <p>Modalidad: <?php echo $curso->modalidad; ?></p>
                            <p>Intensidad: <?php echo $curso->intensidad_hrs; ?></p>
                            <div class="curso-btn">
                                <a href="/detalle_curso?id=<?php echo $curso->id; ?>">Conoce más</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach; ?>
                <!--
                <div class="curso">
                    <div class="curso-img">
                        <a href="/detalle_curso"><img src="/build/img/img-cursos/0586441aa5ffb5b8d405b09fe0f80118.jpg" alt=""></a>
                    </div>
                    <div class="curso-texto">
                        <h4>Area de la Salud</h4>
                        <p>Curso de Inyectologia</p>
                        <p>Modalidad: Presencial</p>
                        <p>Intensidad: 40h</p>
                        <div class="curso-btn">
                            <a href="/detalle_curso">Conoce más</a>
                        </div>
                    </div>
                </div>
                <div class="curso">
                    <div class="curso-img">
                        <a href="/detalle_curso"><img src="build/img/img-cursos/0586441aa5ffb5b8d405b09fe0f80118.jpg" alt=""></a>
                    </div>
                    <div class="curso-texto">
                        <h4>Area de la Salud</h4>
                        <p>Curso de Inyectologia</p>
                        <p>Modalidad: Presencial</p>
                        <p>Intensidad: 40h</p>
                        <div class="curso-btn">
                            <a href="/detalle_curso">Conoce más</a>
                        </div>
                    </div>
                </div>
                <div class="curso">
                    <div class="curso-img">
                        <a href="/detalle_curso"><img src="build/img/img-cursos/0586441aa5ffb5b8d405b09fe0f80118.jpg" alt=""></a>
                    </div>
                    <div class="curso-texto">
                        <h4>Area de la Salud</h4>
                        <p>Curso de Inyectologia</p>
                        <p>Modalidad: Presencial</p>
                        <p>Intensidad: 40h</p>
                        <div class="curso-btn">
                            <a href="/detalle_curso">Conoce más</a>
                        </div>
                    </div>
                </div>
                -->
            </div> <!-- cursos-contenido -->
        </div>
    </div> <!-- fin cursos -->


    <main class="destacados">

        <section id="bachilleracademico" class="contenedor line-seudoelement">

            <div class="bachiller">
                <div class="img-bachilleres">
                    <img loading="lazy" class="img-bachiller1" src="build/img/clases-bachillerato.jpg" alt="img-academico" width="400" height="300">
                    <img loading="lazy" class="img-bachiller2" src="build/img/mujer graduada bachiller.jpg" alt="img-bachillerato">
                </div>
                <div class="texto-bachiller">
                    <h2><?php echo $infoidx->ttpp1;?></h2>
                    <h4><?php echo $infoidx->txpp1;?></h4>
                    <ul>
                        <li><?php echo $infoidx->txa1p1;?></li>
                        <li><?php echo $infoidx->txa2p1;?></li>
                        <li><?php echo $infoidx->txa3p1;?></li>
                        
                    </ul>

                  <!--<p>• Pruebas de reconocimiento de saberes.</p>--> 
                     <!--   <p>• Guías Pedagógicas</p>-->
                     <!--   <p>• Soporte de docentes capacitados</p>-->

                    <h3><?php echo $infoidx->subtp1;?></h3>
                    <p><?php echo $infoidx->txa4p1;?></p>
                    <h3><?php echo $infoidx->minfop1;?></h3>
                    <h4 class="bachiller-texto-contacto"><img loading="lazy" src="build/img/telefono.png" alt="telefono whastapp"> <?php echo $infoidx->tel1;?> <?php echo $infoidx->tel2;?></h4>
                    <a href="/contacto" class="btn-bachiller">CONTACTENOS</a>
                    <h3><?php echo $infoidx->sedes;?></h3>
                    <p><?php echo $infoidx->sede1;?></p>
                    <p><?php echo $infoidx->sede2;?></p>
                    <p><?php echo $infoidx->sede3;?></p>
                </div>
                

            </div>
        </section>
    
        <div class="contenedor" id="pqnosotros">
            <div class="contenido-destacados">
                <h2><?php echo $infoidx->ttpd;?></h2>
                <div class="graduacion-cm">
                    <div class="img-graduacion">
                        <img loading="lazy" src="build/img/graduacion-cm.jpg" alt="Graduación Carlo Magno">
                    </div>
                    
                    <div>
                        <h4><?php echo $infoidx->subtd;?></h4>
                        <p><?php echo $infoidx->dscpd;?></p>
                    </div> 
                    <div class="matriculate">
                        <div class="contenido-matriculate">
                            <h4>Fundación Educativa Artistica y Cultural CarloMagno</h4>
                            <h4>MATRICÚLATE</h4>
                            <P>¿Qué Esperas?</P>
                            <a href="/oferta_academica" class="btn-bachiller">Inscríbete YA!</a>
                        </div>
                    </div>  
                </div>
                <h3><?php echo $infoidx->ttpb;?></h3>
                <div class="descripcion-destacados">    
                    <div class="descripcion">
                        <div class="destacado">
                            <img loading="lazy" src="build/img/icons-dinero.png" alt="img-dinero">
                            <div class="info-destacado">
                                <h4><?php echo $infoidx->subtb1;?></h4>
                                <p><?php echo $infoidx->descpb1;?></p>
                            </div>
                        </div>
                        
                        <div class="destacado">
                            <img loading="lazy" src="build/img/icons-diploma2.png" alt="img-dinero">
                            <div class="info-destacado">
                                <h4><?php echo $infoidx->subtb2;?></h4>
                                <p><?php echo $infoidx->descpb2;?></p>
                            </div>

                        </div>
                        <div class="destacado">
                            <img loading="lazy" src="build/img/icons-tiempo.png" alt="img-dinero">
                            <div class="info-destacado">
                                <h4><?php echo $infoidx->subtb3;?></h4>
                                <p><?php echo $infoidx->descpb3;?></p>
                            </div>
                        </div>
                        <div class="destacado">
                            <img loading="lazy" src="build/img/icons-garantía-azuloscuro.png" alt="img-dinero">
                            <div class="info-destacado">
                                <h4><?php echo $infoidx->subtb4;?></h4>
                                <p><?php echo $infoidx->descpb4;?></p>
                            </div>
                        </div>
                    </div>

                    <div class="imagen-destacados">
                        <img loading="lazy" src="build/img/estudiantes.jpg" alt="imagen-destacados">
                    </div>
                </div> <!--fin descripcion destacada-->
            </div>
        </div>
    </main>

    <div class="convenios">
        <div class="text line-seudoelement">
            <h2>Entidades que nos certifican</h2>
            <p>a cada uno de nuestros procesos academicos.</p>
        </div>
        <div class="contenedor contenido-convenios">
            <div class="convenio">
                <img src="build/img/convenios/alejandromagno sin bk.png" alt="carlomagno">
            </div>
            <div class="convenio tomedent">
                <img src="build/img/convenios/tomedent.png" alt="carlomagno">
            </div>
            <div class="convenio">
                <img src="build/img/convenios/caballerocalderon.png" alt="carlomagno">
            </div>
            <div class="convenio">
                <img src="build/img/convenios/innovar.png" alt="carlomagno">
            </div>
            <div class="convenio">
                <img src="build/img/convenios/cestelco-sin bk.png" alt="carlomagno">
            </div>
            <div class="convenio">
                <img src="build/img/convenios/san pablo.jpg" alt="carlomagno">
            </div>
            <div class="convenio">
                <img src="build/img/convenios/intev.png" alt="carlomagno">
            </div>
            <div class="convenio ansa">
                <img src="build/img/convenios/ansa.jpg" alt="carlomagno">
            </div>
        </div>
    </div>

    <div class="banda2">
        <div class="contenedor modo-banda2">

            <div class="banda2-campo">
                <span class="num" data-valor="<?php echo $infoidx->stact;?>">000</span>
                <span class="text">Estudiantes Activos</span>
            </div>
            <div class="banda2-campo">
                <span class="num" data-valor="<?php echo $infoidx->numsedes;?>">000</span>
                <span class="text">Sedes Nacionales</span>
            </div>
            <div class="banda2-campo">
                <span class="num" data-valor="<?php echo $infoidx->stgrad;?>">000</span>
                <span class="text">Estudiantes Graduados</span>
            </div>
            <div class="banda2-campo">
                <img loading="lazy" src="build/img/cm de cali.png" alt="camara de comercio">
            </div>
            <div class="banda2-campo">
                <img loading="lazy" src="build/img/dian.png" alt="img-dian">
            </div>
        </div>
    </div>


    <section class="contacto-index">
        <div class="contenedor line-seudoelement">
            <h3>¿Tienes Dudas? <span>Contactate Con nosotros</span></h3>
        </div>
        <div class="contacto-info">
            <div class="contacto-descripcion">
                <h2>Estudia con nosotros, te ayudamos a cumplir tus sueños... Pregunta por las <span>ofertas académicas</span></h2>
                <h3>Un equipo de profesionales con ética y resposabilidad, líderes, enfocados en la educación te asistirá y te brindará el conocimiento y las herramientas para alcanzar tus objetivos.</h3>
                <h3>Llamanos a la linea:</h3>   
                <a class="btn-bachiller" href="#">+573168476702</a>
                <img src="build/img/qr.png" width="300" height="250" alt="Codigo QR">
            </div>
            <div class="contenido-formulario">
                <div class="contacto">
                    <h3>Solicitar Información</h3>
                    <form class="formulario" action="https://formsubmit.co/59b1b6ab4ce37a156442732b039d00d9" method="POST">
                        <input name="Nombre" type="text" placeholder="Nombre" required>
                        <input name="Telefono" type="text" placeholder="Teléfono" required>
                        <input name="Email" type="email" placeholder="E-mail" required>
                        <input name="ciudad" type="text" placeholder="Ciudad" required>
                        <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                        <input type="submit">

                        <input type="hidden" name="_next" value="https://fundacioneducativacarlomagno.com.co/">
                        <input type="hidden" name="_captcha" value="false">
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="build/js/preloader.js"></script>
    <script src="build/js/sliders.js"></script>
    <script src="build/js/app_cm.js"></script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Técnico Ingles A1 - B2 | Oferta Académica Armenia Quindío</title>
    <meta name="title" name="Técnico Ingles A1 - B2 | Oferta Académica Armenia Quindío">
    <meta name="description" content="Entidad que cuenta con un equipo profesional, matrículas asequibles, certificación, flexibilidad de tiempo, educación de calidad | Decide formar tu futuro ahora">
    <link rel="canomical" href="https://fundacioneducativacarlomagno.com.co/oferta_academica">

    <title>CarloMagno</title>
    <link rel="icon" type="image/png" href="/build/img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="cabezote">

        <div class="container-oferta-academica">
          
            <div class="info">
                <ul class="info-basica">
                    <li><img class="logo-cm" src="build/img/logo.png" alt="imagen logo Fundación Carlo Magno"></li>
                    <li><a href="/contacto"><img src="build/img/icons-ubicacion.png" alt="icono de ubicación"></a><p>(+57)<?php echo $info->tel1; ?></p></li>
                    <li><img src="build/img/icons-email.png" alt="icono de email">info@fundacioneducativacarlomagno.com.co</li>
                    <li><p>NIT: <?php echo $info->nit; ?></p></li>
                </ul>
                <div class="rrss">
                    <a href="<?php echo $info->facebook; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-facebook-f.svg" alt="img-facebook"></a>
                    <a href="<?php echo $info->instagram; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-instagram.svg" alt="img-instagram"></a>
                    <a href="<?php echo $info->youtube; ?>" rel="nofollow" target="_blank"><img src="build/img/icons-youtube.svg" alt="img-youtube"></a>
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

            <div class="contenido-portada-oferta-academica">
                <h1>Oferta Académica</h1>
                <p>Tenemos para ti un amplio portafolio de programas en nuestras sedes a nivel nacional</p>
                <p>Estudia con nosotros y preparate hacia el futuro</p>
            </div>
        </div> <!--fin container-->
    </header>  <!-- fin del header total-->

    <!--boton flotante                 3168476702--> 
    <div class="btn-flotante">
        <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->whatsapp; ?>" rel="nofollow" target="_blank"><img loading="lazy" src="build/img/icons-whatsapp-96.png" alt="whatsapp"></a>
    </div>

    <main class="contenedor oferta-academica">
        <h2>Programa Académico Carlo Magno</h2>
        <section class="contenido-programas-academicos">
            <div class="programas">
                <?php foreach($ofertas as $oferta): ?>
                    <?php if($oferta->estado == 1): ?>
                <div id="t4" class="programa">
                    <div class="programa-detalle">
                        <div class="nombre">
                            <h4><?php echo $oferta->tipo; ?></h4>
                            <h3><?php echo $oferta->nombre; ?></h3>
                        </div>
                        <div>
                            <h4 class="abierto">Abierto</h4>
                            <p>A Nivel Nacional</p>
                        </div>

                        <div class="v-mas"><p>Ver más</p></div>
                    </div>
                    <div data-id="4" class="programa-vermas">  <!-- vermas-activo clase q se agrega con js-->
                        <p class="description" ><?php echo $oferta->descripcion; ?></p>
                        <div class="contenido-programa">
                            <div class="img-detalles">
                                <div class="img-programa">
                                    <img src="build/img/img-programas/<?php echo $oferta->imagen; ?>" alt="">
                                </div>
                                <div class="detalles">
                                    <ul>
                                        <li><i class="fa-solid fa-circle-check"></i> Modalidad: <p><?php echo $oferta->modalidad; ?></p></li>
                                        <li><i class="fa-solid fa-circle-check"></i> Duracion: <p><?php echo $oferta->duracion; ?></p></li>
                                        <li><i class="fa-solid fa-circle-check"></i> Jornada: <p><?php echo $oferta->jornada; ?></p></li>
                                        <li><i class="fa-solid fa-circle-check"></i> Horario: <p><?php echo $oferta->horario; ?></p></li>
                                        <li><i class="fa-solid fa-circle-check"></i> Ubicacion: <p><?php echo $oferta->ubicacion; ?></p></li>
                                        <li><i class="fa-solid fa-circle-check"></i> Matricula: <p><?php echo $oferta->matricula; ?></p></li>
                                    </ul>
                                    <div class="OA"><a href="/contacto" class="btn-bachiller">Inscribete</a></div>
                                </div>
                            </div>  
                            <div class="resolucion-certificado">
                                <div class="resolucion">
                                    <h4>Registro del programa</h4>
                                    <p><?php echo $oferta->resolucion; ?></p>
                                </div>
                                <div class="certificado">
                                    <h4>Certificado que se Otorga</h4>
                                    <p><?php echo $oferta->titulo; ?></p>
                                </div>
                            </div>
                        </div>   <!-- fin contenido-programa-->
                    </div> <!-- fin contenido-vermas-->
                </div> <!-- fin programa-->
                <?php endif; ?>
            <?php endforeach; ?>    
            </div> <!--fin programas-->

            <aside class="informacion-sidebar">
                <h3>Información Contacto</h3>
                <h4>Consulta Académica</h4>
                <p>fundacioncarlomagnoa@gmail.com</p>
                <p>Teléfono: <span class="rq"><?php echo $info->tel1; ?></span></p>
                <p>Sede Principal:</p>
                <p class="rq"><?php echo $info->direccion_p; ?></p>
                <!-- <p>Armenia - Quindío</p> -->
                <h4>Visite Nuestras Redes</h4>
                <a href="<?php echo $info->facebook; ?>" target="_blank"><img loading="lazy" src="build/img/Facebook-f_color.svg" alt="rs-facebook"></a>
                <a href="<?php echo $info->instagram; ?>" target="_blank"><img loading="lazy" src="build/img/Instagram-color.svg" alt="rs-instagram"></a>
                <a href="https://api.whatsapp.com/send?phone=57<?php echo $info->whatsapp; ?>" target="_blank"><img loading="lazy" src="build/img/WhatsApp-color.svg" alt="rs-whatsapp"></a>
                <hr/>
                <h4>Requisitos: </h4>
                <p>- Documento de identidad</p>
                <p class="rq">Para nivelación bachillerato: </p>
                <p>- Certificado último grado</p>
                <p>- Documento de identidad</p>
                <p class="rq">Si eres menor de edad: </p>
                <p>- Haber realizado el noveno grado de la educación media</p>
                <p>- Documento de Identidiad del acudiente</p>
            </aside>
        </section>
    </main>


    <script src="build/js/app_cm.js"></script>
    <script>



        const parametrosurl = new URLSearchParams(window.location.search);
        const id = parametrosurl.get('id');
       /* 
        if(id!=null){
            const programa_vermas = document.querySelectorAll('.programa-vermas');
            programa_vermas.forEach(ver=>{
                if(ver.dataset.id === id){
                    //console.log(ver.previousElementSibling.querySelector('.programa-detalle h3').textContent);
                    ver.classList.toggle('vermas-activo');
                    ver.previousElementSibling.querySelector('.v-mas p').textContent = "Ver menos";
                    ver.previousElementSibling.querySelector('.v-mas p').classList.add('signo_pseudoelement');
                }
            });
            const programa = document.querySelector('#t'+id);
            programa.firstElementChild.firstElementChild.lastElementChild.classList.toggle('nombreh3');
            programa.scrollIntoView({behavior: 'smooth'});
        }*/

        //codigo que me muestra y esconde  la informacion adicional al dar click en ver mas 
        const acordions = document.querySelectorAll('.v-mas p');
        acordions.forEach(acordion =>{
            acordion.addEventListener('click', function(e){
                const vermascontent = e.target.parentElement.parentElement.nextElementSibling;  //se seleccion el div d class programa-vermas
                vermascontent.classList.toggle('vermas-activo');

                e.target.parentElement.previousElementSibling.previousElementSibling.querySelector('.nombre h3').classList.toggle('nombreh3'); //subraya al nombre de cada carrera

                if( e.target.textContent == 'Ver más'){
                    e.target.textContent = 'Ver menos';
                    e.target.classList.add('signo_pseudoelement');     }
                else{
                    e.target.textContent = 'Ver más';
                    e.target.classList.remove('signo_pseudoelement');
                }
            });
        });
    </script>
</body>
</html>
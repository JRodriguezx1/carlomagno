
<main class="editar-index style-main">
    
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h3>Pagina Principal</h3>
    <form action="/admin/dashboard/editar_index" method="POST">
    <div class="bloque-contenedor">
        <div class="editar-slider-contenedor">
            
            <h4>Imagenes Animadas del Encabezado <p>Imagenes .jpg (1920 x 1280)</p></h4>
            <div class="editar-slider">
                <?php
                $i = 0;
                $j = 0;
                do{ 
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/background{$i}.jpg");
                    if($existe_archivo):
                        $j++;
                ?>
                        <div data-img="<?php echo $i ?>" class="img-slider">
                            <img src="<?php echo "../../build/img/background{$i}.jpg?v=1".rand();?>" alt="imagen slider">
                            <div class="btn--eliminar"><a id="btn-eliminar-slider" href="#">Eliminar</a></div>
                        </div>
                <?php
                    endif;
                    $i++;
                }while($i<8);  ?>
            </div>
            <div class="btnfile">
               <!-- <label for="img-slider">Cambiar</label> -->
                <input  <?php echo ($j>7?"disabled":''); ?> type="file" id="img-slider">
            </div>
        </div>
        <div class="editar-eslogan">
            <h4>Eslogan</h4>
            <div class="editar-eslogan-campos">
                <div class="campo">
                    <label class="campo-label" for="etxb1">Texto Blanco: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['etxb1'])?'marcarerror':''; ?>" type="text" id="etxb1" name="etxb1" placeholder="" value="<?php echo $info->etxb1; ?>">
                    <label data-num="24" class="campo-contchart">24</label>
                </div>
                <div class="campo">
                    <label class="campo-label--verde" for="etxv1">Texto Verde: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['etxv1'])?'marcarerror':''; ?>" type="text" id="etxv1" name="etxv1" placeholder="" value="<?php echo $info->etxv1 ?? ''; ?>">
                    <label data-num="11" class="campo-contchart">11</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="etxb2">Texto Blanco: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['etxb2'])?'marcarerror':''; ?>" type="text" id="etxb2" name="etxb2" placeholder="" value="<?php echo $info->etxb2 ??''; ?>">
                    <label data-num="43" class="campo-contchart">43</label>
                </div>
                <div class="campo">
                    <label class="campo-label--verde" for="etxv2">Texto Verde: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['etxv2'])?'marcarerror':''; ?>" type="text" id="etxv2" name="etxv2" placeholder="" value="<?php echo $info->etxv2 ??''; ?>">
                    <label data-num="11" class="campo-contchart">11</label>
                </div>
            </div>
        </div>
        <div class="textoendheader">
            <h4>Texto final del encabezado</h4>
            <div class="textoendheader-campos">
                <div class="campo">
                    <label class="campo-label" for="txfhb1">Texto Blanco: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txfhb1'])?'marcarerror':''; ?>" type="text" id="txfhb1" name="txfhb1" placeholder="" value="<?php echo $info->txfhb1 ??''; ?>">
                    <label data-num="55" class="campo-contchart">55</label>
                </div>
                <div class="campo">
                    <label class="campo-label--azul" for="txfha1">Texto azul: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txfha1'])?'marcarerror':''; ?>" type="text" id="txfha1" name="txfha1" placeholder="" value="<?php echo $info->txfha1 ?? ''; ?>">
                    <label data-num="55" class="campo-contchart">55</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="txfhb2">Texto Blanco: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txfhb2'])?'marcarerror':''; ?>" type="text" id="txfhb2" name="txfhb2" placeholder="" value="<?php echo $info->txfhb2 ??''; ?>">
                    <label data-num="55" class="campo-contchart">55</label>
                </div>
                <div class="campo">
                    <label class="campo-label--azul" for="txfha2">Texto azul: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txfha2'])?'marcarerror':''; ?>" type="text" id="txfha2" name="txfha2" placeholder="" value="<?php echo $info->txfha2 ?? ''; ?>">
                    <label data-num="55" class="campo-contchart">55</label>
                </div>

            </div>
        </div>
    </div>

    <div class="bloque-contenedor">
        <h4>Titulo de la seccion de cursos</h4>
        <div class="textoendheader-campos">
            <div class="campo">
                <label class="campo-label" for="ttcurso">Titulo: </label>
                <input class="campo-input <?php echo isset($resaltarerror['ttcurso'])?'marcarerror':''; ?>" type="text" id="ttcurso" name="ttcurso" placeholder="" value="<?php echo $info->ttcurso ??''; ?>">
                <label data-num="42" class="campo-contchart">42</label>
            </div>
        </div>
    </div>
    
    <div class="bloque-contenedor">
        <div class="post">
            <div class="post-campos">
                <!--<div class="campo">
                    <label class="campo-label" for="ttpp1">Titulo Principal: </label>
                    <input class="campo-input <?php //echo isset($resaltarerror['ttpp1'])?'marcarerror':''; ?>" type="text" id="ttpp1" name="ttpp1" placeholder="" value="<?php echo $info->ttpp1 ??''; ?>">
                    <label data-num="43" class="campo-contchart">43</label>
                </div>-->
                <h4 class="titulo-index"><?php echo $info->ttpp1 ??''; ?></h4>
                <div class="cambio-titulos">
                    <h4>CAMBIO DE TITULOS</h4>
                    <div class="campo">
                        <label class="campo-label" for="ttpp1">Titulo Principal: </label>
                        <input class="campo-input tituos-imput <?php echo isset($resaltarerror['ttpp1'])?'marcarerror':''; ?>" type="text" id="ttpp1" name="ttpp1" placeholder="" value="<?php echo $info->ttpp1 ??''; ?>">
                        <label data-num="43" class="campo-contchart">43</label>
                    </div>
                    <div class="campo">
                        <label class="campo-label" for="subtp1">Subtitulo: </label>
                        <input class="campo-input tituos-imput <?php echo isset($resaltarerror['subtp1'])?'marcarerror':''; ?>" type="text" id="subtp1" name="subtp1" placeholder="" value="<?php echo $info->subtp1 ??''; ?>">
                        <label data-num="43" class="campo-contchart">43</label>
                    </div>
                </div>
                <div class="campo">
                    <label class="campo-label" for="txpp1">Texto Principal: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txpp1'])?'marcarerror':''; ?>" type="text" id="txpp1" name="txpp1" placeholder="" value="<?php echo $info->txpp1 ?? ''; ?>">
                    <label data-num="150" class="campo-contchart">150</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="txa1p1">Texto Adicional: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txa1p1'])?'marcarerror':''; ?>" type="text" id="txa1p1" name="txa1p1" placeholder="" value="<?php echo $info->txa1p1 ?? ''; ?>">
                    <label data-num="75" class="campo-contchart">75</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="txa2p1">Texto Adicional: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txa2p1'])?'marcarerror':''; ?>" type="text" id="txa2p1" name="txa2p1" placeholder="" value="<?php echo $info->txa2p1 ??''; ?>">
                    <label data-num="75" class="campo-contchart">75</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="txa3p1">Texto Adicional: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txa3p1'])?'marcarerror':''; ?>" type="text" id="txa3p1" name="txa3p1" placeholder="" value="<?php echo $info->txa3p1 ??''; ?>">
                    <label data-num="75" class="campo-contchart">75</label>
                </div>
                <!--<div class="campo">
                    <label class="campo-label" for="subtp1">Subtitulo: </label>
                    <input class="campo-input <?php //echo isset($resaltarerror['subtp1'])?'marcarerror':''; ?>" type="text" id="subtp1" name="subtp1" placeholder="" value="<?php echo $info->subtp1 ??''; ?>">
                    <label data-num="43" class="campo-contchart">43</label>
                </div>-->
                <p class="subtt-index"> - <?php echo $info->subtp1 ??''; ?></p>
                <div class="campo">
                    <label class="campo-label" for="txa4p1">Texto Adicional: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['txa4p1'])?'marcarerror':''; ?>" type="text" id="txa4p1" name="txa4p1" placeholder="" value="<?php echo $info->txa4p1 ??''; ?>">
                    <label data-num="43" class="campo-contchart">43</label>
                </div>
                <!--<div class="campo">
                    <label class="campo-label" for="minfop1">Mas Informacion: </label>
                    <input class="campo-input <?php //echo isset($resaltarerror['minfop1'])?'marcarerror':''; ?>" type="text" id="minfop1" name="minfop1" placeholder="" value="<?php echo $info->minfop1 ?? ''; ?>">
                    <label data-num="31" class="campo-contchart">31</label>
                </div>-->
                <p class="subtt-index"> - Mas Informacion</p>
                <div class="campo">
                    <label class="campo-label" for="tel1">Tel 1: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['tel1'])?'marcarerror':''; ?>" type="number" id="tel1" name="tel1" placeholder="" value="<?php echo $info->tel1 ??''; ?>">
                    <label data-num="20" class="campo-contchart">20</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="tel2">Tel 2: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['tel2'])?'marcarerror':''; ?>" type="number" id="tel2" name="tel2" placeholder="" value="<?php echo $info->tel2 ??''; ?>">
                    <label data-num="20" class="campo-contchart">20</label>
                </div>
                <!--<div class="campo">
                    <label class="campo-label" for="sedes">Sedes nacionales: </label>
                    <input class="campo-input <?php //echo isset($resaltarerror['sedes'])?'marcarerror':''; ?>" type="text" id="sedes" name="sedes" placeholder="" value="<?php echo $info->sedes ??''; ?>">
                    <label data-num="31" class="campo-contchart">31</label>
                </div>-->
                <p class="subtt-index"> - Sede Nacional</p>
                <div class="campo">
                    <label class="campo-label" for="sede1">Sede 1: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['sede1'])?'marcarerror':''; ?>" type="text" id="sede1" name="sede1" placeholder="" value="<?php echo $info->sede1 ??''; ?>">
                    <label data-num="57" class="campo-contchart">57</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="sede2">Sede 2: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['sede2'])?'marcarerror':''; ?>" type="text" id="sede2" name="sede2" placeholder="" value="<?php echo $info->sede2 ??''; ?>">
                    <label data-num="57" class="campo-contchart">57</label>
                </div>
                <div class="campo">
                    <label class="campo-label" for="sede3">Sede 3: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['sede3'])?'marcarerror':''; ?>" type="text" id="sede3" name="sede3" placeholder="" value="<?php echo $info->sede3 ??''; ?>">
                    <label data-num="57" class="campo-contchart">57</label>
                </div>
            </div>
            <p>imagenes .jpg (600 x 600 - 1000 x 1000)</p>
            <div class="img-contenedor">
                <?php
                    $i = 0;          
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/clases-bachillerato.jpg");
                    if($existe_archivo):?>
                        <div data-img="<?php echo 'clases-bachillerato.jpg'; ?>" class="cambiar-img">
                            <img src="<?php echo "/build/img/clases-bachillerato.jpg?v=1".rand();?>" alt="img estudios">
                            <div class="btn--eliminar"><a id="btn-eliminar-post1" href="#">Eliminar</a></div>
                        </div>
                <?php $i++; endif; 
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/mujer graduada bachiller.jpg");
                    if($existe_archivo):?>
                        <div data-img="<?php echo 'mujer graduada bachiller.jpg'; ?>" class="cambiar-img">
                            <img src="<?php echo "/build/img/mujer graduada bachiller.jpg?v=1".rand();?>" alt="img estudios">
                            <div class="btn--eliminar"><a id="btn-eliminar-post1" href="#">Eliminar</a></div>
                        </div>
                    <?php $i++; endif; ?>
            </div>
            <div class="btnfile"><input  <?php echo ($i>1?"disabled":''); ?> type="file" id="imgpost1"></div>
        </div>   
    </div>
    <div class="bloque-contenedor">
      <!--  <div class="post">
            <h4>post 2 <p>imagenes (600 x 600 - 1000 x 1000)</p></h4>
            <div class="img-contenedor">
                <div class="cambiar-img">
                    <img src="/build/img/" alt="clases-bachillerato">
                    <div class="btn--eliminar"><a id="btn-eliminar-post2" href="#">Eliminar</a></div>
                </div>
                <div class="cambiar-img">
                    <img src="/build/img/" alt="mujer graduada bachiller">
                    <div class="btn--eliminar"><a id="btn-eliminar-post2" href="#">Eliminar</a></div>
                </div>
            </div>
            <div class="btnfile"><input  <?php echo (1>2?"disabled":''); ?> type="file" id="imgpost2"></div>
            <div class="post-campos">
                <div class="campo">
                    <label class="campo-label" for="p2t1">Titulo Principal: </label>
                    <input class="campo-input" type="text" id="p2t1" name="p2t1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2txp1">Texto Principal: </label>
                    <input class="campo-input" type="text" id="p2txp1" name="p2txp1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2txa1">Texto Adicional: </label>
                    <input class="campo-input" type="text" id="p2txa1" name="p2txa1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2txa2">Texto Adicional: </label>
                    <input class="campo-input" type="text" id="p2txa2" name="p2txa2" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2txa3">Texto Adicional: </label>
                    <input class="campo-input" type="text" id="p2txa3" name="p2txa3" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2subt1">Subtitulo: </label>
                    <input class="campo-input" type="text" id="p2subt1" name="p2subt1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2subtx1">Texto Adicional: </label>
                    <input class="campo-input" type="text" id="p2subtx1" name="p2subtx1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2masinfo">Mas Informacion: </label>
                    <input class="campo-input" type="text" id="p2masinfo" name="p2masinfo" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2tel1">Tel 1: </label>
                    <input class="campo-input" type="number" id="p2tel1" name="p2tel1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2tel2">Tel 2: </label>
                    <input class="campo-input" type="number" id="p2tel2" name="p2tel2" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2sedesnac">Sedes nacionales: </label>
                    <input class="campo-input" type="text" id="p2sedesnac" name="p2sedesnac" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2dir1">Sede 1: </label>
                    <input class="campo-input" type="text" id="p2dir1" name="p2dir1" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2dir2">Sede 2: </label>
                    <input class="campo-input" type="text" id="p2dir2" name="p2dir2" placeholder="" value="<?php echo ''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="p2dir3">Sede 3: </label>
                    <input class="campo-input" type="text" id="p2dir3" name="p2dir3" placeholder="" value="<?php echo ''; ?>">
                </div>
            </div>
        </div>   -->
    </div>
    <div class="bloque-contenedor">
        <div class="distintivo">
            <div class="distintivo-campos">
                <!--<div class="campo">
                    <label class="campo-label" for="ttpd">Titulo Principal: </label>
                    <input class="campo-input <?php //echo isset($resaltarerror['ttpd'])?'marcarerror':''; ?>" type="text" id="ttpd" name="ttpd" placeholder="" value="<?php echo $info->ttpd ??''; ?>">
                    <label data-num="45" class="campo-contchart">45</label>
                </div>-->
                <h4 class="titulo-index">¿POR QUÉ ESTUDIAR CON NOSOTROS?</h4>
                <div class="campo">
                    <label class="campo-label" for="subtd">Subtitulo: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['subtd'])?'marcarerror':''; ?>" type="text" id="subtd" name="subtd" placeholder="" value="<?php echo $info->subtd ??''; ?>">
                    <label data-num="54" class="campo-contchart">54</label>
                </div>
                <!--<p class="subtt-index"> - FUNDACIÓN EDUCATIVA ARTISTICA Y CULTURAL CARLOMAGNO</p>-->
                <div class="campo">
                    <label class="campo-label" for="dscpd">Descripcion: </label>
                    <textarea name="dscpd" cols="30" rows="4"><?php echo $info->dscpd ??''; ?></textarea>
                   <!-- <input class="campo-input" type="text" id="dscpd" name="dscpd" placeholder="" value="<?php //echo $info->dscpd ??''; ?>">  -->
                   <label data-num="699" class="campo-contchart">699</label>
                </div>
            </div>
            <p>imagenes .jpg (800 x 600 - 1280 x 720 - 1920 x 1200)</p>
            <div class="img-contenedor">
                <?php
                $i = 0;
                 $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/graduacion-cm.jpg");
                 if($existe_archivo):?>
                    <div class="cambiar-img">
                        <img src="/build/img/graduacion-cm.jpg<?php echo '?v='.rand(); ?>" alt="clases-bachillerato">
                        <div class="btn--eliminar"><a id="btn-eliminar-distintivo" href="#">Eliminar</a></div>
                    </div>
                <?php $i=1; endif; ?>
            </div>
            <div class="btnfile"><input  <?php echo ($i>0?"disabled":''); ?> type="file" id="imgdistintivo"></div>
        </div>   
    </div>
    <div class="bloque-contenedor">
        <div class="beneficios-campos">
            <!--<div class="campo">
                <label class="campo-label" for="ttpb">Titulo Principal: </label>
                <input class="campo-input <?php //echo isset($resaltarerror['ttpb'])?'marcarerror':''; ?>" type="text" id="ttpb" name="ttpb" placeholder="" value="<?php echo $info->ttpb ??''; ?>">
                <label data-num="31" class="campo-contchart">31</label>
            </div>-->
            <h4 class="titulo-index">MÁS BENEFICIOS PARA TI</h4>
            <!--<div class="campo">
                <label class="campo-label" for="subtb1">Subtitulo: </label>
                <input class="campo-input <?php //echo isset($resaltarerror['subtb1'])?'marcarerror':''; ?>" type="text" id="subtb1" name="subtb1" placeholder="" value="<?php echo $info->subtb1 ??''; ?>">
                <label data-num="31" class="campo-contchart">31</label>
            </div>-->
            <p class="subtt-index"> - MATRÍCULAS ASEQUIBLES</p>
            <div class="campo">
                <label class="campo-label" for="descpb1">Descripcion: </label>
                <input class="campo-input <?php echo isset($resaltarerror['descpb1'])?'marcarerror':''; ?>" type="text" id="descpb1" name="descpb1" placeholder="" value="<?php echo $info->descpb1 ??''; ?>">
                <label data-num="190" class="campo-contchart">190</label>
            </div>
            <!--<div class="campo">
                <label class="campo-label" for="subtb2">Subtitulo: </label>
                <input class="campo-input <?php //echo isset($resaltarerror['subtb2'])?'marcarerror':''; ?>" type="text" id="subtb2" name="subtb2" placeholder="" value="<?php echo $info->subtb2 ??''; ?>">
                <label data-num="31" class="campo-contchart">31</label>
            </div>-->
            <p class="subtt-index"> - DIPLOMAS DE CERTIFICACIÓN</p>
            <div class="campo">
                <label class="campo-label" for="descpb2">Descripcion: </label>
                <input class="campo-input <?php echo isset($resaltarerror['descpb2'])?'marcarerror':''; ?>" type="text" id="descpb2" name="descpb2" placeholder="" value="<?php echo $info->descpb2 ??''; ?>">
                <label data-num="190" class="campo-contchart">190</label>
            </div>
            <!--<div class="campo">
                 <label class="campo-label" for="subtb3">Subtitulo: </label>
                <input class="campo-input <?php //echo isset($resaltarerror['subtb3'])?'marcarerror':''; ?>" type="text" id="subtb3" name="subtb3" placeholder="" value="<?php echo $info->subtb3 ??''; ?>">
                <label data-num="31" class="campo-contchart">31</label>
            </div>-->
            <p class="subtt-index"> - FLEXIBILIDAD DE TIEMPO</p>
            <div class="campo">
                <label class="campo-label" for="descpb3">Descripcion: </label>
                <input class="campo-input <?php echo isset($resaltarerror['descpb3'])?'marcarerror':''; ?>" type="text" id="descpb3" name="descpb3" placeholder="" value="<?php echo $info->descpb3 ??''; ?>">
                <label data-num="190" class="campo-contchart">190</label>
            </div>
            <!--<div class="campo">
                <label class="campo-label" for="subtb4">Subtitulo: </label>
                <input class="campo-input <?php //echo isset($resaltarerror['subtb4'])?'marcarerror':''; ?>" type="text" id="subtb4" name="subtb4" placeholder="" value="<?php echo $info->subtb4 ??''; ?>">
                <label data-num="31" class="campo-contchart">31</label>
            </div>-->
            <p class="subtt-index"> - EDUCACIÓN DE CALIDAD</p>
            <div class="campo">
                <label class="campo-label" for="descpb4">Descripcion: </label>
                <input class="campo-input <?php echo isset($resaltarerror['descpb4'])?'marcarerror':''; ?>" type="text" id="descpb4" name="descpb4" placeholder="" value="<?php echo $info->descpb4 ??''; ?>">
                <label data-num="190" class="campo-contchart">190</label>
            </div>
        </div>
        <div class="beneficios">
            <p>imagenes .png (100 x 100 - 500 x 500)</p>
            <div class="img-contenedor">
                <div data-beneficio="icons-dinero.png" class="cambiar-img">
                    <?php /*
                    $i = 0;
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/icons-dinero.png");
                    if($existe_archivo)$i=1;
                    ?>
                    <div class="btnfile">
                        <label for="pngdinero">Cambiar</label>
                        <input class="btn-benf"  <?php echo ($i>0?"disabled":''); ?> type="file"" id="pngdinero">
                    </div>
                    <?php if($i):?>
                        <img src="/build/img/icons-dinero.png<?php echo '?v='.rand(); ?>" alt="clases-bachillerato">
                        <div class="btn--eliminar"><p id="btn-eliminar-beneficio">Eliminar</p></div>
                    <?php endif; */ ?>
                </div>
                <div data-beneficio="icons-diploma2.png" class="cambiar-img">
                    <?php /*
                    $i = 0;
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/icons-diploma2.png");
                    if($existe_archivo)$i=1;
                    ?>
                    <div class="btnfile">
                        <label for="pngdiploma">Cambiar</label>
                        <input class="btn-benf"  <?php echo ($i>0?"disabled":''); ?> type="file" id="pngdiploma">
                    </div>
                    <?php if($i):?>
                        <img src="/build/img/icons-diploma2.png<?php echo '?v='.rand(); ?>" alt="clases-bachillerato">
                        <div class="btn--eliminar"><p id="btn-eliminar-beneficio">Eliminar</p></div>
                    <?php endif;  */ ?>
                </div>
                <div data-beneficio="icons-tiempo.png" class="cambiar-img">
                    <?php /*
                    $i = 0;
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/icons-tiempo.png");
                    if($existe_archivo)$i=1;
                    ?>
                    <div class="btnfile">
                        <label for="pngtiempo">Cambiar</label>
                        <input class="btn-benf"  <?php echo ($i>0?"disabled":''); ?> type="file" id="pngtiempo">
                    </div>
                    <?php if($i):?>
                        <img src="/build/img/icons-tiempo.png<?php echo '?v='.rand(); ?>" alt="clases-bachillerato">
                        <div class="btn--eliminar"><p id="btn-eliminar-beneficio">Eliminar</p></div>
                    <?php endif; */ ?>
                </div>
                <div data-beneficio="icons-garantía-azuloscuro.png" class="cambiar-img">
                    <?php /*
                    $i = 0;
                    $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/icons-garantía-azuloscuro.png");
                    if($existe_archivo)$i=1;
                    ?>
                    <div class="btnfile">
                        <label for="pnggarantia">Cambiar</label>
                        <input class="btn-benf"  <?php echo ($i>0?"disabled":''); ?> type="file" id="pnggarantia">
                    </div>
                    <?php if($i):?>
                        <img src="/build/img/icons-garantía-azuloscuro.png<?php echo '?v='.rand(); ?>" alt="clases-bachillerato">
                        <div class="btn--eliminar"><p id="btn-eliminar-beneficio">Eliminar</p></div>
                    <?php endif; */ ?>
                </div>
            </div>
        </div>   
    </div>
    <div class="bloque-contenedor">
        <div class="estadisticos">
            <h4 class="titulo-index">Actualizar Contadores</h4>
            <div class="estadisticos-campos">
                <div class="campo">
                    <label class="campo-label" for="stact">Estudiantes Activos: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['stact'])?'marcarerror':''; ?>" type="number" id="stact" name="stact" placeholder="" value="<?php echo $info->stact ??''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="numsedes">Sedes Nacionales: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['numsedes'])?'marcarerror':''; ?>" type="number" id="numsedes" name="numsedes" placeholder="" value="<?php echo $info->numsedes ??''; ?>">
                </div>
                <div class="campo">
                    <label class="campo-label" for="stgrad">Estudiantes Graduados: </label>
                    <input class="campo-input <?php echo isset($resaltarerror['stgrad'])?'marcarerror':''; ?>" type="number" id="stgrad" name="stgrad" placeholder="" value="<?php echo $info->stgrad ??''; ?>">
                </div>
            </div>    
        </div>

    </div>
    <div class="guardar-index">
        <input type="submit" value="Guardar">
    </div>
    </form>

</main>
<script src="/build/js/editar_index.js" defer></script>
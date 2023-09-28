<?php //['error'][] as ['error] => ['strin1', 'string2'...]
    foreach($alertas as $key => $alerta){ //$key => [error],   $alerta = ['strin1', 'string2'...]
        foreach($alerta as $mensaje){  //   $mensaje = 'string1'.. 'string2'   
            ?>
            <div class="alerta <?php echo $key ?>"> <!-- echo $key = clase deacuerdo al tipo de alerta si es un error etc -->
            <i class="<?php echo $key=='error'?'fa-solid fa-triangle-exclamation':'fa-solid fa-check'; ?>" ></i> <label for=""><?php echo ' '.$mensaje;   ?></label>
            </div>

            <?php
        }
}
?>
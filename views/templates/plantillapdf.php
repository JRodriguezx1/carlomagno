<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarloMagno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/build/css/apps.css">
    <link rel="icon" type="image/png" href="/build/img/logo.png"/>
</head>
<body>

    <div class="plantillapdf">
        <table class="encabezado">
            <tr>
                <td class="logo">
                    <div>
                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/build/img/logoazulpng1.png" alt="logo">
                    </div>
                </td>
                <td class="infoempresa">
                    <h4>Fundacion Educativa Artistica y Cultural CarloMagno</h4>
                    <p>Av Bolivar Cr 14 # 5-63 oficina 4, Armenia Quindio</p>
                    <p>NIT: 901558438-6</p>
                    <p>Telefono: 3168476702</p>
                </td>
                <td class="infofactura">
                    <div class="contenido-factura">
                        <h4>Factura</h4>
                        <div class="datos-factura">
                            <p>Nª de Factura: <?php echo $pago[0]->id; ?></p>
                            <p>Fecha: <?php echo $pago[0]->fecha; ?></p>
                            <p>Matricula: <?php echo $pago[0]->idmatricula; ?></p>
                            <!--<p>Procesado: Julian David Rodriguez</p>-->
                        </div>
                    </div>
                </td>
            </tr>
	    </table>

        <table class="estudiante-programa">
            <tr>
                <td class="estudiante">
                    <h4>Estudiante</h4>
                    <div class="info-texto">
                        <p>Cedula: <?php echo $pago[0]->estudiante[0]->cedula; ?></p>
                        <p>Nombre: <?php echo $pago[0]->estudiante[0]->nombre.' '.$pago[0]->estudiante[0]->apellido; ?></p>
                        <p>Telefono: <?php echo $pago[0]->estudiante[0]->telefono; ?></p>
                        <p>Email: <?php echo $pago[0]->estudiante[0]->email; ?></p>
                    </div>
                </td>
                <td class="espacio"></td>
                <td class="programa">
                    <h4>Programa - Dependencia</h4>
                    <div class="info-texto">
                        <p>Programa: <?php echo $pago[0]->nombreprograma; ?></p>
                        <p>Codigo: x</p>
                        <p>Sede: Armenia</p>
                    </div>                   
                </td>
            </tr>
        </table>

        <table class="detalle">
            <thead>
                <tr>
                    <th><h4>Item</h4></th>
                    <th><h4>Descripcion</h4></th>
                    <th><h4>Valor Unitario</h4></th>
                    <th><h4>% Desc</h4></th>
                    <th><h4>Valor Total</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><p>1</p></td>
                    <td><p><?php echo $pago[0]->concepto; ?></p></td>
                    <td><p><?php echo $pago[0]->monto; ?></p></td>
                    <td><p>0.00</p></td>
                    <td><p><?php echo $pago[0]->monto; ?></p></td>
                </tr>
            </tbody>
        </table>

        
        <div class="contenedor-resumen">
            <table class="resumen">
                <tr>
                    <td class="QR">
                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/build/img/qr.png" alt="logo">
                    </td>
                    <td class="flecha">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </td>
                    <td class="masinfo">
                        <div class="contenido-masinfo">
                            <p class="texto-masinfo">MAS INFORMACION AQUI</p>
                            <p>Consulta tu estado academico</p>
                            <p>escaneado el codigo QR</p>
                        </div>
                    </td>
                    <td class="texto-cobro">
                        <p>Subtotal: </p>
                        <p>Descuento: </p>
                        <p>Total: </p>
                    </td>
                    <td class="cobro">
                        <div class="contenido-cobro">
                            <p><?php echo $pago[0]->monto; ?></p>
                            <p>0.00</p>
                            <p><?php echo $pago[0]->monto; ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="resumen-texto">
                <p>Si usted tiene preguntas sobre esta factura pongase</p>
                <p>en contacto con su nombre, cedula, telefono y email</p>
                <p>al correo: info@fundacioneducativacarlomagno.com.co</p>
            </div>
        </div>

        <div class="paginaweb">
            <p>FUNDACION EDUCATIVA ARTISTICA Y CULTURAL CARLOMAGNO</p>
            <span>www.fundacioneducativacarlomagno.com.co/</span>
        </div>

    </div>
</body>
</html>
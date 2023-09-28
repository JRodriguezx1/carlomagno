<main class="print style-main">
    
    <h3>Recibo de pago</h3>

    <div class="btns">
        <div class="btn">
            <a href="/admin/dashboard/admin_estudiantes/ver?id=<?php echo $pago[0]->idmatricula; ?>">Volver</a>
        </div>
        <div class="btn">
            <a href="/admin/dashboard/admin_estudiantes/pdf?id=<?php echo $pago[0]->id; ?>">Generar PDF</a>
        </div>
    </div>

    <h4>Imprimir pago Nª: <?php echo $pago[0]->id; ?></h4>

    <div class="contenedor-print">
        <div class="encabezado">
            <div class="logo">
                <img src="/build/img/logoazulpng1.png" alt="logo">
            </div>
            <div class="marca">
                <h4>Fundacion Educativa Artistica y Cultural CarloMagno</h4>
                <p>Av Bolivar Cr 14 # 5-63 oficina 4, Armenia Quindio</p>
                <p>Telefono: 3168476702</p>
            </div>
            <div class="tipo-documento">
                <h4>Factura</h4>
                <div class="info-factura">
                    <p>Nª de Factura: <?php echo $pago[0]->id; ?></p>
                    <p>Fecha: <?php echo $pago[0]->fecha; ?> </p>
                    <p>Matricula: <?php echo $pago[0]->idmatricula; ?></p>
                    <!--<p>Procesado: Julian David Rodriguez</p> -->
                </div>
            </div>
        </div>
        <div class="estudiante-programa">
            <div class="estudiante">
                <h4>Estudiante</h4>
                <div class="info-texto">
                    <p>Cedula: <?php echo $pago[0]->estudiante[0]->cedula; ?></p>
                    <p>Nombre: <?php echo $pago[0]->estudiante[0]->nombre.' '.$pago[0]->estudiante[0]->apellido; ?></p>
                    <p>Telefono: <?php echo $pago[0]->estudiante[0]->telefono; ?></p>
                    <p>Email: <?php echo $pago[0]->estudiante[0]->email; ?></p>
                </div>
            </div>
            <div class="programa">
                <h4>Programa - Dependencia</h4>
                <div class="info-texto">
                    <p>Programa: <?php echo $pago[0]->nombreprograma; ?></p>
                    <p>Codigo: x</p>
                    <p>Sede: Armenia</p>
                </div>
            </div>
        </div>


        <div class="objeto">
            <div class="item">
                <h4>Item</h4>
                <p>1</p>
            </div>
            <div class="descripcion">
                <h4>Descripcion</h4>
                <p><?php echo $pago[0]->concepto; ?></p>
            </div>
            <div class="valor-unitario">
                <h4>Valor Unitario</h4>
                <p><?php echo $pago[0]->monto; ?></p>
            </div>
            <div class="dcto">
                <h4>% Desc</h4>
                <p>0.00</p>
            </div>
            <div class="valor-total">
                <h4>Valor Total</h4>
                <p><?php echo $pago[0]->monto; ?></p>
            </div>
        </div>

        <div class="resumen">
            <div class="QR-subtotal">
                <div class="QR">
                    <img src="/build/img/qr.png" alt="logo">
                    <div class="contenido-masinfo">
                        <i class="fa-solid fa-arrow-left-long"></i>
                        <p class="masinfo">MAS INFORMACION AQUI</p>
                        <p>Consulta tu estado academico</p>
                        <p>escaneado el codigo QR</p>
                    </div>
                </div>
                <div class="contenido-subtotal">
                    <div class="subtotal">
                        <div class="col1">
                            <p>Subtotal: </p>
                            <p>Descuento: </p>
                            <p>Total: </p>
                        </div>
                        <div class="col2">
                            <span><?php echo $pago[0]->monto; ?></span>
                            <span>0.00</span>
                            <span><?php echo $pago[0]->monto; ?></span>
                        </div>
                    </div>
                </div>
            </div>
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
</main>
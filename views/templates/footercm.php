
    <footer>
        <div class="contenedor">
            <div class="line-seudoelement">
               <h3>Fundación Educativa Artistica y Cultural CarloMagno</h3>
            </div>
            <div class="footer-contenido">
                <div class="inferior footer-logo">
                    <img loading="lazy" src="build/img/logoazulpng1.png" alt="logo carlo magno">
                    <p><?php echo $info->infolegal; ?></p>
                </div>
                <div class="inferior footer-menu">
                    <h3>Menú</h3>
                    <a href="/">Inicio</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/estudiantes">Estudiantes</a>
                    <a href="/oferta_academica">Oferta Académica</a>
                    <a href="/galeria">Galeria</a>
                    <a href="/contacto">Contacto</a>
                </div>
                <div class="inferior footer-contacto">
                    
                    <h3>Contacto</h3>
                    <div class="footer-container">
                    <div class="subcantactos">
                        <div class="subcantacto">
                            <img loading="lazy" src="build/img/icons-marcador.png" alt="img-direccion">
                            <p><?php echo $info->direccion_p; ?></p>
                        </div>
                        <div class="subcantacto">
                            <img loading="lazy" src="build/img/icons-smartphone3.png" alt="img-movil">
                            <p><?php echo $info->tel1.' '.'-'.' '.$info->tel2; ?></p>
                        </div>
                        <div class="subcantacto">
                            <img loading="lazy" src="build/img/icons-email-verde.png" alt="img-email">
                            <p>info@fundacioneducativacarlomagno.com</p>
                        </div>
                    </div> <!-- fin subcontactos-->
                    </div> <!-- fin footer-container-->
                </div><!-- fin footer-cotacto-->
            </div>

            <div class="all-right">
               <p>Copyright ©2022 Todos los derechos reservados | Desarrollado by <a href="https://www.innovatechquindio.com.co">InnovaTechQuidío</a></p>
            </div>
        </div>
    </footer>

</body>
</html>
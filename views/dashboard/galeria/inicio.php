<main class="galeria style-main">
    <h3>Pagina de galeria</h3>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <h4>Subir imagen</h4>
    <div class="form-subirfoto">
        <form class="formulario" method="POST" enctype="multipart/form-data" action="/admin/dashboard/contenido_fotografico">
            <div class="formulario-campo">
                <label class="formulario-label" for="titulo">Titulo</label>
                <input class="formulario-input <?php echo isset($resaltarerror['titulo'])?'marcarerror':''; ?>" type="text" id="titulo" name="titulo" placeholder="titulo de la imagen" required >
            </div>
            <div class="formulario-campo">
                <label class="formulario-label" for="imagen">Imagen</label>
                <input class="formulario-input formulario-file" type="file" id="imagen" name="imagen" required>
            </div>
            
            <input class="formulario-submit--secundario" type="submit" value="Subir">
        </form>
    </div>
    <p>Imagenes publicadas:</p>
    <div class="contenido-fotos">
        <?php foreach($foto as $row): ?>
            <div class="foto">
                <p> <?php echo $row->titulo ?></p>
                <img src="<?php echo "/build/img/Fotos CarloMagno/{$row->nombreimg}?v=".rand(); ?>" alt="">
                <div class="btn-vaciarimg"><a href="/admin/dashboard/contenido_fotografico/delete?id=<?php echo $row->id; ?>"><i class="fa-solid fa-trash"></i></a></div>
            </div>
        <?php endforeach; ?>
    </div>

</main>
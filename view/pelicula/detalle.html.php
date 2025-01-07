<div class="div-detalle-peliculas-principal">
    <div class="div-detalle-peliculas">
        <img class="img-detalle-peliculas" src="<?php echo $dataToView["data"]["foto"] ?>" alt="">
        <div class="div-detalle-descripciones-pelicula">
            <div class="div-detalle-datos-pelicula">
                <h3>Titulo: <?php echo $dataToView["data"]["nombre"] ?></h3>
                <h3>Duracion: <?php echo $dataToView["data"]["duracion"] ?></h3>
                <h3>Genero: <?php echo $dataToView["data"]["genero"] ?></h3>
                <h3>Descripcion: <?php echo $dataToView["data"]["descripcion"] ?></h3>
            </div>
            <div class="div-detalle-descarga-pelicula">
                <a href="index.php?controller=pelicula&action=download&file=<?php echo $dataToView["data"]["contenido"] ?>"><img src="assets/Images/descargar.png" alt=""></a>
                <?php if($_SESSION["rol"]==="admin") {?><a href="index.php?controller=pelicula&action=delete&id=<?php echo $dataToView["data"]["id"] ?>"><div class="div-borrar"><p>Borrar pelicula</p></div></a><?php } ?>
            </div>
        </div>
    </div>
</div>
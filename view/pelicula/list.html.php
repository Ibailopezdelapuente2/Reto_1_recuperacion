<div class="contenedor-list-principal">
    <div class="div-peliculas">
        <h1>Peliculas:</h1>
        <?php foreach ($dataToView["data"]["peliculas"] as $peliculas) { ?>
            <a href="index.php?controller=pelicula&action=detalle&id=<?php echo $peliculas["id"] ?>"><div class="pelicula">
                <div class="div-img-peliculas-inicial">
                    <img class="img-peliculas-inicial" src="<?php echo $peliculas["foto"] ?>" alt="">
                </div>
                <div class="div-info-peliculas-inicial">
                    <p>Titulo: <?php echo $peliculas["nombre"] ?></p>
                    <p>Duracion: <?php echo $peliculas["duracion"] ?>min</p>
                    <p>Genero: <?php echo $peliculas["genero"] ?></p>
                </div>
            </div></a>
        <?php } ?>
    </div>
    <div class="div-series">
        <h1>Series:</h1>
        <?php foreach ($dataToView["data"]["series"] as $series) { ?>
            <a href=""><div class="serie">
                <div class="div-img-series-inicial">
                        <img class="img-series-inicial" src="<?php echo $series["foto"] ?>" alt="">
                    </div>
                    <div class="div-info-series-inicial">
                        <p>Titulo: <?php echo $series["nombre"] ?></p>
                        <p>Genero: <?php echo $series["genero"] ?></p>
                    </div>
            </div></a>
        <?php } ?>
    </div>
</div>
<div class="contenedor-list-all">
    <div class="contenedor-arriba-list-all">
        <h1>Peliculas:</h1>
        <div class="div-buscar">
            <form method="post" action="index.php?controller=pelicula&action=listCategoria" >
                <label for="boton-buscar"><img class="img-lupa" src="assets/Images/lupa.png" alt=""></label>
                <input class="caja-buscar" id="caja-buscar" type="text" placeholder="Buscar por categoria" name="categoria">
                <input type="submit" id="boton-buscar" style="display: none;">
            </form>
        </div>
    </div>
    <div class="div-series-all">
        <?php foreach ($dataToView["data"] as $pelis) { ?>
            <a href="index.php?controller=pelicula&action=detalle&id=<?= $pelis["id"] ?>"><div class="serie">
                <div class="div-img-series-inicial">
                        <img class="img-series-inicial" src="<?php echo $pelis["foto"] ?>" alt="">
                    </div>
                    <div class="div-info-series-inicial">
                        <p>Titulo: <?php echo $pelis["nombre"] ?></p>
                        <p>Titulo: <?php echo $pelis["duracion"] ?></p>
                        <p>Genero: <?php echo $pelis["genero"] ?></p>
                    </div>
            </div></a>
        <?php } ?>
    </div>
</div>
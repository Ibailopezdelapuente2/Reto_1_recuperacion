<div class="contenedor-list-all">
    <div class="contenedor-arriba-list-all">
        <h1>Series:</h1>
        <div class="div-buscar">
            <form method="post" action="index.php?controller=serie&action=listCategoria" >
                <label for="boton-buscar"><img class="img-lupa" src="assets/Images/lupa.png" alt=""></label>
                <input class="caja-buscar" id="caja-buscar" type="text" placeholder="Buscar por categoria" name="categoria">
                <input type="submit" id="boton-buscar" style="display: none;">
            </form>
        </div>
    </div>
    <div class="div-series-all">
        <?php foreach ($dataToView["data"] as $series) { ?>
            <a href="index.php?controller=serie&action=puenteDetalle&serie_id=<?= $series["id"] ?>"><div class="serie">
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
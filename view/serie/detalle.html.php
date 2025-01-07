<div class="div-detalle-peliculas-principal">
    <div class="div-detalle-series">
        <img class="img-detalle-peliculas" src="<?php echo $dataToView["data"]["serie"][0]["foto"] ?>" alt="">
        <div class="div-detalle-descripciones-serie">
            <div class="div-detalle-serie-separar">
                <div class="div-seleccionar-temporada-detalle">
                <?php if($_SESSION["rol"]==="admin") {?><a href="index.php?controller=serie&action=delete&id=<?php echo $dataToView["data"]["serie"][0]["id"] ?>"><div class="div-borrar"><p>Borrar serie</p></div></a><?php } ?>

                    <form method="post" action="index.php?controller=serie&action=getCapitulos&serie_id=<?php echo $dataToView["data"]["serie"][0]["id"]; ?>">
                    <label for="temporadaSelect">Temporada:</label>
                        <select name="temporadaSelect" id="temporadaSelect" >
                            <?php foreach ($dataToView["data"]["temporadas"] as $temporadaIndex => $temporada): ?>
                                <option value="<?= $temporada['id'] ?>" <?= $temporada['id'] == $_GET["temporada_id"] ? 'selected' : '' ?>>
                                    Temporada <?= $temporada['numero'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Seleccionar temporada</button>
                    </form>   
                </div>
                <div class="div-detalle-datos-serie">
                    <h3>Titulo: <?php echo $dataToView["data"]["serie"][0]["nombre"] ?></h3>
                    <h3>Genero: <?php echo $dataToView["data"]["serie"][0]["genero"] ?></h3>
                    <h3>Descripcion: <?php echo $dataToView["data"]["serie"][0]["descripcion"] ?></h3> 
                </div>
            </div>
            <div class="div-detalle-temporada">
                <h2>Temporada <?= $_GET["temporada_id"] ?></h2>
                <?php foreach ($dataToView["data"]["capitulos"] as $capituloIndex => $capitulo): ?>
                    <div class="div-detalle-capitulo">
                        <h3>Capítulo <?= $capitulo['num_capitulo'] ?>: <?= htmlspecialchars($capitulo['titulo']) ?></h3>
                        <p>Descripcion: <?= $capitulo['descripcion'] ?></p>
                        <a href="index.php?controller=serie&action=download&file=<?php echo $capitulo['contenido'] ?>">
                            <img src="assets/Images/descargar.png" alt="">
                        </a>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
</div>

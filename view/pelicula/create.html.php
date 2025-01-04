<div class="div-creacion-principal">
    <div class="div-form-creacion">
        <h1>Añadir pelicula</h1>
        <form class="form-creacion" action="index.php?controller=pelicula&action=save" method="post" enctype="multipart/form-data">
            <input required placeholder="Titulo de la pelicula" type="text" name="titulo">
            <input required placeholder="Duración de la pelicula en minutos" type="number" name="duracion">
            <input required placeholder="Genero de la pelicula" type="text" name="genero">
            <textarea required rows="4" cols="50" placeholder="Descripcion de la pelicula" type="text" name="descripcion"></textarea>
            <label for="contenido-pelicula">Subir pelicula</label>
            <input required type="file" id="contenido-pelicula" style="display: none;" name="contenido">
            <label for="portada-pelicula">Subir portada</label>
            <input required type="file" id="portada-pelicula" style="display: none;" name="portada">
            <button>Subir pelicula</button>
        </form>
    </div>
</div>
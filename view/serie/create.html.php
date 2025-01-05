<div class="div-creacion-principal">
    <div class="div-form-creacion">
        <h1>Añadir Serie</h1>
        <form class="form-creacion" action="index.php?controller=serie&action=save" method="post" enctype="multipart/form-data">
            <input required placeholder="Titulo de la serie" type="text" name="titulo">
            <input required placeholder="Genero de la serie" type="text" name="genero">
            <textarea required rows="4" cols="50" placeholder="Descripcion de la serie" type="text" name="descripcion"></textarea>
            <label for="portada-serie">Subir portada</label>
            <input required type="file" id="portada-serie" style="display: none;" name="portada-serie">
            <h2>Temporadas:</h2>
            <div id="temporadasContainer"></div>
            <button type="button" id="addTemporadaButton">Añadir Temporada</button>
            <button type="submit">Subir Serie</button>
        </form>
        <script>
            const temporadasContainer = document.getElementById("temporadasContainer");
            const addTemporadaButton = document.getElementById("addTemporadaButton");

            let temporadaCount = 0;

            addTemporadaButton.addEventListener("click", () => {
                temporadaCount++;

                const temporadaDiv = document.createElement("div");
                temporadaDiv.className = "temporada";

                temporadaDiv.innerHTML = `
                    <h3>Temporada ${temporadaCount}</h3>
                    <div id="capitulosContainerTemporada${temporadaCount}" class="capitulosContainer"></div>
                    <button type="button" class="addCapituloButton" data-temporada="${temporadaCount}">Añadir Capítulo</button>
                    <button type="button" onclick="this.parentElement.remove()">Eliminar Temporada</button>
                `;

                temporadasContainer.appendChild(temporadaDiv);

                const addCapituloButton = temporadaDiv.querySelector('.addCapituloButton');
                const capitulosContainer = temporadaDiv.querySelector(`#capitulosContainerTemporada${temporadaCount}`);
                let capituloCount = 0;

                addCapituloButton.addEventListener("click", () => {
                    capituloCount++;

                    const capituloDiv = document.createElement("div");
                    capituloDiv.className = "capitulo";

                    capituloDiv.innerHTML = `
                        
                        <h4>Capítulo ${capituloCount}</h4>
                        <input type="text" name="temporadas[${temporadaCount}][capitulos][${capituloCount}][titulo]" placeholder="Título del capítulo" required>
                        <input type="text" name="temporadas[${temporadaCount}][capitulos][${capituloCount}][duracion]" placeholder="Duración del capítulo" required>
                        <textarea name="temporadas[${temporadaCount}][capitulos][${capituloCount}][descripcion]" placeholder="Descripción del capítulo" rows="4" cols="30" required></textarea>
                        <label for="capitulo${temporadaCount}${capituloCount}-serie">Subir capítulo</label>
                        <input id="capitulo${temporadaCount}${capituloCount}-serie" type="file" name="temporadas[${temporadaCount}][capitulos][${capituloCount}][contenido]" style="display: none;" required>
                        <button type="button" onclick="this.parentElement.remove()">Eliminar Capítulo</button>
                    `;

                    capitulosContainer.appendChild(capituloDiv);
                });
            });
        </script>
    </div>
</div>
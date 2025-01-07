document.addEventListener("DOMContentLoaded", function() {

    /* Validación de creación de películas */
    const formCrearPelicula = document.querySelector(".form-creacion[action*='pelicula']");
    formCrearPelicula.addEventListener("submit", function(event) {
        try {
            const tituloInput = formCrearPelicula.querySelector("input[name='titulo']");
            const duracionInput = formCrearPelicula.querySelector("input[name='duracion']");
            const generoInput = formCrearPelicula.querySelector("input[name='genero']");
            const descripcionInput = formCrearPelicula.querySelector("textarea[name='descripcion']");
            const contenidoInput = formCrearPelicula.querySelector("input[name='contenido']");
            const portadaInput = formCrearPelicula.querySelector("input[name='portada']");
            let error = false;

            [tituloInput, duracionInput, generoInput, descripcionInput, contenidoInput, portadaInput].forEach(input => {
                if (input.value.trim() === "" || (input.type === "file" && input.files.length === 0)) {
                    input.classList.add("invalid");
                    error = true;
                } else {
                    input.classList.remove("invalid");
                }
            });

            if (error) event.preventDefault();
        } catch (error) {
            console.error("Error en la validación de creación de película:", error);
        }
    });

    /* Validación de creación de series */
    const formCrearSerie = document.querySelector(".form-creacion[action*='serie']");
    formCrearSerie.addEventListener("submit", function(event) {
        try {
            const tituloInput = formCrearSerie.querySelector("input[name='titulo']");
            const generoInput = formCrearSerie.querySelector("input[name='genero']");
            const descripcionInput = formCrearSerie.querySelector("textarea[name='descripcion']");
            const portadaInput = formCrearSerie.querySelector("input[name='portada-serie']");
            let error = false;

            [tituloInput, generoInput, descripcionInput, portadaInput].forEach(input => {
                if (input.value.trim() === "" || (input.type === "file" && input.files.length === 0)) {
                    input.classList.add("invalid");
                    error = true;
                } else {
                    input.classList.remove("invalid");
                }
            });

            if (error) event.preventDefault();
        } catch (error) {
            console.error("Error en la validación de creación de serie:", error);
        }
    });

    /* Validación de creación de usuarios */
    const formCrearUsuario = document.querySelector(".form-creacion[action*='usuario']");
    formCrearUsuario.addEventListener("submit", function(event) {
        try {
            const nombreInput = formCrearUsuario.querySelector("input[name='nombre']");
            const correoInput = formCrearUsuario.querySelector("input[name='correo']");
            const contrasennaInput = formCrearUsuario.querySelector("input[name='contrasenna']");
            const rolInput = formCrearUsuario.querySelector("input[name='rol']");
            let error = false;

            [nombreInput, correoInput, contrasennaInput, rolInput].forEach(input => {
                if (input.value.trim() === "") {
                    input.classList.add("invalid");
                    error = true;
                } else {
                    input.classList.remove("invalid");
                }
            });

            if (error) event.preventDefault();
        } catch (error) {
            console.error("Error en la validación de creación de usuario:", error);
        }
    });
});

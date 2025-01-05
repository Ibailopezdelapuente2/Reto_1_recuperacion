<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/estilos/layout.css">
    <link rel="stylesheet" href="assets/estilos/pelicula.css">
    <link rel="stylesheet" href="assets/estilos/serie.css">
</head>
<body>
    <div class="div-nav">
        <div class="div-menu">
            <a href="index.php?controller=pelicula&action=list"><img class="img-logo" src="assets/Images/logo_egibideflix.png" alt=""></a>
            <ul>
                <li><a href="index.php?controller=pelicula&action=list">Inicio</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">Peliculas</a></li>
                <li><a href="#">Populares</a></li>
                <li><a href="#">Mi lista</a></li>
            </ul>
        </div>
        <div class="div-buscador-perfil">
            <div class="div-buscar">
                <label for="caja-buscar"><img class="img-lupa" src="assets/Images/lupa.png" alt=""></label>
                <input class="caja-buscar" id="caja-buscar" type="text" placeholder="Buscar por categoria">
            </div>
            <div class="div-añadir-pelicula">
                <a href="index.php?controller=pelicula&action=create">Añadir pelicula</a>
            </div>
            <div class="div-añadir-serie">
                <a href="index.php?controller=serie&action=create">Añadir serie</a>
            </div>
            <div class="div-menu">
                <img class="img-avatar" src="assets/Images/hombre.png" alt="">
                <div class="div-menu-desplegable">
                    <div class="div-usuario">
                        <div class="div-cuenta">
                            <img class="img-usuario" src="assets/Images/usuario.png" alt="">
                            <a href="#">Cuenta</a>
                        </div>
                        <div class="div-avatar">
                            <img class="img-usuario" src="assets/Images/usuario.png" alt="">
                            <a href="#">Editar avatar</a>
                        </div>
                    </div>
                    <div class="div-cerrar-sesion">
                        <a href="#">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                <li><a href="index.php?controller=serie&action=getAllSeries&page=1">Series</a></li>
                <li><a href="index.php?controller=pelicula&action=listAll&page=1">Peliculas</a></li>
        </div>
        <div class="div-buscador-perfil">
        <?php if($_SESSION["rol"] === "admin"){ ?>
            <div class="div-añadir-pelicula">
                <a href="index.php?controller=pelicula&action=create">Añadir pelicula</a>
            </div>
            <div class="div-añadir-serie">
                <a href="index.php?controller=serie&action=create">Añadir serie</a>
            </div>
            <?php } ?>
            <div class="div-menu">
                <img class="img-avatar" src="assets/Images/hombre.png" alt="">
                <div class="div-menu-desplegable">
                    <?php if($_SESSION["rol"] === "admin"){ ?>
                    <div class="div-usuario">
                        <div class="div-cuenta">
                            <img class="img-usuario" src="assets/Images/usuario.png" alt="">
                            <a href="index.php?controller=usuario&action=createView">Crear usuario</a>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="div-cerrar-sesion">
                        <a href="index.php?controller=usuario&action=cerrarSesion">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
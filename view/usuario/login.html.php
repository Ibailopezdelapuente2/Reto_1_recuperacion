<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Netflix Sans, Helvetica Neue, Segoe UI, Roboto, Ubuntu, sans-serif;
    color: #e5e5e5;
    font-weight: 600;
}

.login-atras{
    height: 100vh;
    width: 100%;
    background-image: url(assets/Images/fondo-login.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    padding: 1em;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login{
    height: 50vh;
    width: 22%;
    background-color: rgb(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 2em;
    border-radius: 2%;
}

.campos{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 1.5em;
}

.campos input{
    background-color: rgb(0, 0, 0, 0.8);
    border: rgb(166, 166, 166) solid 0.000000001em;
    border-radius: 3px;
    height: 6vh;
    width: 15em;
}

.campos input::placeholder{
    padding-left: 1em;
}

.btn-iniciar-sesion{
    color: black;
    padding: 0 2em;
}
</style>
<div class="login-atras">
        <div class="login">
            <h1>Iniciar sesion</h1>
            <form action="index.php?controller=usuario&action=comprobarLogin" method="post">
                <div class="campos">
                    <input placeholder="Correo" name="correo" type="email">
                    <input placeholder="Contraseña" name="contrasenna" type="password">
                    <button class="btn-iniciar-sesion">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
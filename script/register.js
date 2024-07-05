const containerForm = document.getElementById("inicioSesion");
const boton = document.getElementById("btnRegistro");
const botonLogin = document.getElementById("btnLogin");

boton.addEventListener("click", function() {
    containerForm.innerHTML = '<div class="inicioSesion"><h3>Registrarse</h3> <form class="form" action="signUp" method="POST"> <label class="form-label" for="nombre">Nombre:</label> <input type="text" id="nombre" name="nombre" required> <label class="form-label" for="apellido">Apellido:</label> <input  type="text" id="apellido" name="apellido" required> <label class="form-label" for="username">Nombre de Usuario:</label> <input  type="text" id="username" name="username" required> <label class="form-label" for="password">Contraseña:</label> <input  type="password" id="password" name="password" required> <button class="btn btn-primary" type="submit">Registrarse</button> <p class="errorMsg"><?=$error?></p> </form></div>';
    boton.style = "display: none;";
    botonLogin.style = "display: block;";
});

botonLogin.addEventListener("click", function (){
    containerForm.innerHTML = '<div class="inicioSesion"> <h3>Iniciar Sesión</h3> <form class="form" action="postLogin" method="POST"> <label class="form-label" for="username">Nombre de Usuario:</label> <input type="text" id="username" name="username" required> <label class="form-label" for="password">Contraseña:</label> <input type="password" id="password" name="password" required> <button class="btn btn-primary" type="submit">Iniciar Sesión</button> <p class="errorMsg"><?=$error?></p></form></div>';
    boton.style = "display: block;";
    botonLogin.style = "display: none;";
});
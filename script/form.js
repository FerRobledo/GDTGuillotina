let loginMsg = document.querySelector('.loginMsg'),
  login = document.querySelector('.login'),
  signupMsg = document.querySelector('.signupMsg'),
  signup = document.querySelector('.signup'),
  frontbox = document.querySelector('.frontbox'),
  switch1 = document.getElementById("switch1"),
  switch2 = document.getElementById("switch2")
  container = document.querySelector(".containerForm")
  izq = document.getElementById("izq")
  der = document.getElementById("der")
  containerLogos = document.querySelector(".containerLogos")
  textcontent = document.querySelectorAll(".textcontent");

  switch1.addEventListener('click', function() {
    // Mostrar formulario de registro y ocultar el de inicio de sesión
    loginMsg.classList.add("visibility");
    frontbox.classList.add("moving");
    signupMsg.classList.remove("visibility");
    
    signup.classList.remove('hide');
    login.classList.add('hide');
});

switch2.addEventListener('click', function() {
    // Mostrar formulario de inicio de sesión y ocultar el de registro
    loginMsg.classList.remove("visibility");
    frontbox.classList.remove("moving");
    signupMsg.classList.add("visibility");
    
    signup.classList.add('hide');
    login.classList.remove('hide');
});

document.addEventListener("DOMContentLoaded", function(){
  containerLogos.classList.add("open");
  container.classList.add("openContainer");
})

var menu_toggle = document.querySelector('.menu_toggle');
var menu = document.querySelector('.menu');
var menu_toggle_span = document.querySelector('.menu_toggle span');

    menu_toggle.onclick = function()
{
    menu_toggle.classList.toggle('active');
    menu_toggle_span.classList.toggle('active');
    menu.classList.toggle('responsive') ;
}

var passwordInput = document.getElementById("password-input");
var togglePassword = document.querySelector(".toggle-password");


togglePassword.addEventListener("click", function() {

    if (passwordInput.type === "password") {
    passwordInput.type = "text";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
    } 
    else {
    passwordInput.type = "password";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
    }
});
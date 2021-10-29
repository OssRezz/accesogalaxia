const correo = document.querySelector("#correo");
const password = document.querySelector("#password");
const formLogin = document.querySelector("#formLogin");
const btnIngresar = document.querySelector("#btn-ingresar");

eventListener();
iniciarApp();

//eventListener
function eventListener() {
    correo.addEventListener("blur", validarForm);
    password.addEventListener("blur", validarForm);
}

function validarForm(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("border", "border-danger");
    } else {
        e.target.classList.add("border", "border-danger");
    }

    if (correo.value !== "") {
        btnIngresar.disabled = false;
        btnIngresar.classList.remove("text-dark");
    }
}

function iniciarApp() {
    //Disabled btn-ingresar buttom
    btnIngresar.disabled = true;
    btnIngresar.classList.add("text-dark");
}

//Script para validar los campos del Login
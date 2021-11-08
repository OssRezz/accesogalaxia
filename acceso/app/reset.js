const fromAccess = document.querySelector("#frmAccess");
const btnClean = document.querySelector("#btn-clean");


document.addEventListener("DOMContentLoaded", () => {
  btnClean.addEventListener("click", () => {
    myFunction();
    if (typeof window.history.pushState == "function") {
      window.history.pushState({}, "Hide", "http://acceso.test/acceso/vista/accessControl.php");
    }
  });
});

function myFunction() {
  fromAccess.reset();
}

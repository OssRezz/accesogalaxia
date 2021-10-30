$(document).ready(function () {
  //Inicio de sesion
  $("#btn-ingresar").click(function (e) {
    const documento = $("#documento").val();
    const contraseña = $("#contraseña").val();
    $.post("sesion/control/ctrlInicioSesion.php",{
        documento: documento,
        contraseña: contraseña
      }, function (responseText) {
        $("#respuesta").html(responseText);
      });
  });
});

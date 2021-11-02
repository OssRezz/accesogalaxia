$(document).ready(function (e) {
  $("#btn-agregar-empresa").click(function (e) {
    $.post("../control/ctrlModalEmpresa.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $(document).click((e) => {
    if (e.target.id === "btn-insertar-empresa") {
      const nit = $("#nit").val();
      const nombreEmpresa = $("#nombreEmpresa").val();
      $.post(
        "../control/ctrlInsertEmpresa.php",
        {
          nit: nit,
          nombreEmpresa: nombreEmpresa,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    }
  });

  
});

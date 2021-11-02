$(document).ready(function (e) {
  $("#btn-agregar-empresa").click(function (e) {
    $.post("../control/ctrlModalEmpresa.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $(document).click((e) => {
    let nit;
    if (e.target.id === "btn-insertar-empresa") {
      nit = $("#nit").val();
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
    } else if (e.target.id === "btn-editar-empresa") {
      nit = e.target.value;
      $.post(
        "../control/ctrlEditarEmpresa.php",
        {
          nit: nit,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-actualizar-empresa") {
      const nitEmpresa = $("#nitEmpresa").val();
      const empId = $("#empNit").val();
      const empNombre = $("#empNombre").val();
      const empEstado = $("#empEstado").val();
      $.post(
        "../control/ctrlActualizarEmpresa.php",
        {
          nitEmpresa: nitEmpresa,
          empId: empId,
          empNombre: empNombre,
          empEstado: empEstado,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    }
  });
});

$(document).ready(function (e) {
  $("#btn-ingresar-acceso").click(function (e) {
    const fechaEntrada = $("#fechaEntrada").val();
    const documento = $("#documento").val();
    const nombre = $("#nombre").val();
    const genero = $("#genero").val();
    const tSangre = $("#tSangre").val();
    const tPersona = $("#tPersona").val();
    const zDestino = $("#zDestino").val();
    const origen = $("#origen").val();
    const empresaUser = $("#empresaUser").val();
    let serie = $("#serie").val();
    let referencia = $("#referencia").val();
    let placa = $("#placa").val();
    $.post(
      "../control/ctrlIngresarAcceso.php",
      {
        fechaEntrada: fechaEntrada,
        documento: documento,
        nombre: nombre,
        genero: genero,
        tSangre: tSangre,
        tPersona: tPersona,
        zDestino: zDestino,
        origen: origen,
        empresaUser: empresaUser,
        serie: serie,
        referencia: referencia,
        placa: placa,
      },
      function (responseText) {
        $("#respuesta").html(responseText);
      }
    );
  });

  $(document).click((e) => {
    if (e.target.id === "btn-salida") {
      const id = e.target.value;
      $.post(
        "../control/ctrlSalida.php",
        {
          id: id,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    }
  });
});

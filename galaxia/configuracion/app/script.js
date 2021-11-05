$(document).ready(function () {
  $("#btn-cambiar-password").click(function () {
    const primeraPassword = $("#primeraPassword").val();
    const segundoPassword = $("#segundoPassword").val();
    const idUsuario = $("#idUsuario").val();
    $.post(
      "../control/ctrlActualizarPassword.php",
      {
        primeraPassword: primeraPassword,
        segundoPassword: segundoPassword,
        idUsuario: idUsuario,
      },
      function (responseText) {
        $("#respuesta").html(responseText);
      }
    );
  });

  $("#btn-modal-zona").click(function () {
    $.post("../control/ctrlModalZonas.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $("#btn-modal-origen").click(function () {
    $.post("../control/ctrlModalOrigenes.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $("#btn-modal-bloquear").click(function () {
    $.post("../control/ctrlModalOrigenes.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $(document).click((e) => {
    if (e.target.id === "btn-ingresar-zona") {
      const empresaUser = $("#empresaUser").val();
      const zonaNombre = $("#zonaNombre").val();
      $.post(
        "../control/ctrlInsertarZona.php",
        {
          empresaUser: empresaUser,
          zonaNombre: zonaNombre,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-ingresar-origen") {
      const empresaUser = $("#empresaUser").val();
      const origenNombre = $("#origenNombre").val();
      $.post(
        "../control/ctrlInsertarOrigenes.php",
        {
          empresaUser: empresaUser,
          origenNombre: origenNombre,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    }
  });
});

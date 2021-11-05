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
    $.post("../control/ctrlModalBloquear.php", {}, function (responseText) {
      $("#respuesta").html(responseText);
    });
  });

  $(document).click((e) => {
    //Controladores de zona
    //Ingresar una zona
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
      //Modal editar una zona
    } else if (e.target.id === "btn-editar-zona") {
      const idZona = e.target.value;
      $.post(
        "../control/ctrlModalEditarZonas.php",
        {
          idZona: idZona,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );

      //Actualizar zona
    } else if (e.target.id === "btn-actualizar-zona") {
      const zonEstado = $("#zonEstado").val();
      const zonId = $("#zonId").val();
      $.post(
        "../control/ctrlActualizarZona.php",
        {
          zonEstado: zonEstado,
          zonId: zonId,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );

      //Controladores de origen
      //Ingresar origen
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

      //modal Editar un origen
    } else if (e.target.id === "btn-editar-origen") {
      const oriId = e.target.value;
      $.post(
        "../control/ctrlModalEditarOrigen.php",
        {
          oriId: oriId,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
      //actualizar origenes
    } else if (e.target.id === "btn-actualizar-origen") {
      const oriEstado = $("#oriEstado").val();
      const oriId = $("#oriId").val();
      $.post(
        "../control/ctrlActualizarOrigen.php",
        {
          oriEstado: oriEstado,
          oriId: oriId,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );

      //Bloquear persona
    } else if (e.target.id === "btn-bloquear-persona") {
      const documento = $("#documento").val();
      const empresaUser = $("#empresaUser").val();
      $.post(
        "../control/ctrlBloquearIngreso.php",
        {
          documento: documento,
          empresaUser: empresaUser,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-desbloquear") {
      const bloId = e.target.value;
      $.post(
        "../control/ctrlEliminarBloqueado.php",
        {
          bloId: bloId,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-eliminar-bloqueado") {
      const idBloqueado = e.target.value;
      $.post(
        "../control/ctrlModalEliminarBloqueado.php",
        {
          idBloqueado: idBloqueado,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-editar-adiciones") {
      const id = e.target.value;
      $.post(
        "../control/ctrlModalAdiciones.php",
        {
          id: id,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    } else if (e.target.id === "btn-actualizar-adicion") {
      const adiEstado = $("#adiEstado").val();
      const adiId = $("#adiId").val();

      $.post(
        "../control/ctrlActualizarAdicion.php",
        {
          adiEstado: adiEstado,
          adiId: adiId,
        },
        function (responseText) {
          $("#respuesta").html(responseText);
        }
      );
    }
  });
});

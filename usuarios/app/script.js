$(document).ready(function() {

    $('#btn-ingresar-usuario').click(() => {

        const nombre = $('#nombre').val();
        const documento = $('#documento').val();
        const password = $('#password').val();
        const perfil = $('#perfil').val();
        const empresa = $('#empresa').val();

        $.post("../control/ctrlInsertarUsuarios.php", {
            nombre: nombre,
            documento: documento,
            password: password,
            perfil: perfil,
            empresa: empresa,
        }, function(responseText) {
            $("#respuesta").html(responseText);
        });
    });

    $(document).click((e) => {
        if (e.target.id === "btn-editar-empresa") {
            const idUsuario = e.target.value;
            $.post("../control/ctrlModalEditar.php", {
                idUsuario: idUsuario
            }, function(responseText) {

                $("#respuesta").html(responseText);
            });
        } else if (e.target.id === "btn-actualizar-usuario") {
            const idUsuario = $('#idUsuario').val();
            const nombreUsuario = $('#nombreUsuario').val();
            const documentoUsuario = $('#documentoUsuario').val();
            const perfilUsuario = $('#perfilUsuario').val();

            $.post("../control/ctrlActualizarUsuarios.php", {
                idUsuario: idUsuario,
                nombreUsuario: nombreUsuario,
                documentoUsuario: documentoUsuario,
                perfilUsuario: perfilUsuario,
            }, function(responseText) {
                $("#respuesta").html(responseText);
            });
        }
    });






});
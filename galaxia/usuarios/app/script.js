$(document).ready(function() {

    $('#btn-ingresar-usuario').click(function() {

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



});
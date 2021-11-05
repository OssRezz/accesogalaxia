$(document).ready(function() {
    $("#arma").change(function() {
        const value = $(this).val();
        if (value != 1) {
            $("#serie").prop("disabled", true);
        } else {
            $("#serie").prop("disabled", false);
        }
    });
    $("#computador").change(function() {
        const value = $(this).val();
        if (value != 1) {
            $("#referencia").prop("disabled", true);
        } else {
            $("#referencia").prop("disabled", false);
        }
    });
    $("#vehiculo").change(function() {
        const value = $(this).val();
        if (value != 1) {
            $("#placa").prop("disabled", true);
        } else {
            $("#placa").prop("disabled", false);
        }
    });
});
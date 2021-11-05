<?php

require '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';

$config = new Config();
$modal = new Modal();


$primeraPassword = $_POST['primeraPassword'];
$segundoPassword = $_POST['segundoPassword'];
$idUsuario = $_POST['idUsuario'];

$FirstPassword = rtrim($primeraPassword, " ");
$SecondPassword = rtrim($segundoPassword, " ");

if (empty($FirstPassword) != 1 && empty($SecondPassword) != 1) {
    if ($FirstPassword === $SecondPassword) {
        if ($config->cambiarPassword($idUsuario, password_hash($FirstPassword, PASSWORD_DEFAULT))) {
            $modal->modalAlerta("text-primary", "Informaciòn", "La contraseña se ha actualizado correctamente.");
        }
    } else {
        $modal->modalInformativa("text-danger", "Alerta", "Las contraseñan no coinciden.");
    }
} else {
    $modal->modalInformativa("text-warning", "Alerta", "Todos los campos son requeridos.");
}

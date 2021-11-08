<?php

require '../Modelo/ModeloSesion.php';
require '../../componentes/Modal.php';

$modal =  new Modal();
$sesion = new Sesion();

$documento = $_POST["documento"];
$contraseña = $_POST["contraseña"];
$passwordhash;

$Documento = rtrim($documento, " ");
$Contraseña = rtrim($contraseña, " ");


if (empty($Documento) != 1 && empty($Contraseña) != 1) {

    if ($existeUsuario = $sesion->UserVerify($documento)) {
        foreach ($existeUsuario as $existeUsuario) {
            $passwordhash = $existeUsuario["usePassword"];
        }

        if (password_verify($Contraseña, $passwordhash)) {

            $sesion->iniciarSesion($Documento);
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'reportes/vista/reportes.php'";
            echo "</script>";
        } else {
            $modal->modalInformativa("text-warning", "Informaciòn", "Las contraseñas no coinciden.");
        }
    } else {
        $modal->modalInformativa("text-warning", "Informaciòn", "Las credenciales no coinciden con algùn registro en nuestro servidor");
    }
} else {
    $modal->modalInformativa("text-danger", "Informaciòn", "Todos los campos son requeridos.");
}

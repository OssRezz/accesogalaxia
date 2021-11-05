<?php

require '../Modelo/ModeloSesion.php';
require '../../componentes/Modal.php';

$modal =  new Modal();
$sesion = new Sesion();

$documento = $_POST["documento"];
$contraseña = $_POST["contraseña"];

$Documento = rtrim($documento, " ");
$Contraseña = rtrim($contraseña, " ");


if (empty($Documento) != 1 && empty($Contraseña) != 1) {
    if ($sesion->iniciarSesion($Documento, $Contraseña)) {
        echo "<script type='text/javascript'>";
        echo "window.location.href = 'reportes/vista/reportes.php'";
        echo "</script>";
    } else {
        $modal->modalInformativa("text-warning", "Informaciòn", "Las credenciales no coinciden con algùn registro en nuestro servidor");
    }
} else {
    $modal->modalInformativa("text-danger", "Informaciòn", "Todos los campos son requeridos.");
}

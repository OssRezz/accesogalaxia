<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$documento = $_POST['documento'];
$empresaUser = $_POST['empresaUser'];

$Documento = rtrim($documento, " ");
$Estado = 1;


if (empty($documento) != 1) {
    if ($config->bloquearPersona($empresaUser,$Documento, $Estado)) {
        $modal->modalAlerta("text-primary", "Informacion", "La persona con el documento: $Documento, se ha bloqueado exitosamente.");
    }
} else {
    $modal->modalAlerta("text-warning", "Alerta", "Todos los campos son requeridos.");
}

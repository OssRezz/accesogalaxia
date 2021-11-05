<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$origen = $_POST['origenNombre'];
$empresa = $_POST['empresaUser'];

$Origen = rtrim($origen, " ");
$Empresa = rtrim($empresa, " ");
$Estado = 1;


if (empty($Origen) != 1 && empty($Empresa) != 1) {
    if ($config->insetarOrigen($Empresa, $Origen, $Estado)) {
        $modal->modalAlerta("text-primary", "Informacion", "El origen se ha registrado exitosamente.");
    } else {
        $modal->modalAlerta("text-danger", "Alerta", "El origen no se puede registrar");
    }
} else {
    $modal->modalAlerta("text-warning", "Alerta", "Todos los campos son requeridos.");
}

<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$zona = $_POST['zonaNombre'];
$empresa = $_POST['empresaUser'];

$Zona = rtrim($zona, " ");
$Empresa = rtrim($empresa, " ");
$Estado = 1;

if (empty($Zona) != 1 && empty($Empresa) != 1) {
    if ($config->insertarZona($Empresa, $Zona,$Estado)) {
        $modal->modalAlerta("text-primary", "Informacion", "La zona se ha registrado exitosamente.");
    } else {
        $modal->modalAlerta("text-danger", "Alerta", "La zona no se puede registrar");
    }
} else {
    $modal->modalAlerta("text-warning", "Alerta", "Todos los campos son requeridos.");
}

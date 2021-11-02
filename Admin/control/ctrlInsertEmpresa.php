<?php

require_once '../../componentes/Modal.php';
require_once '../Modelo/ModeloAdmin.php';

$modal = new Modal();
$empresa = new Admin();


$nit = $_POST['nit'];
$nombre = $_POST['nombreEmpresa'];

$Nit = rtrim($nit, " ");
$NombreEmpresa = rtrim($nombre, " ");
$Estado = 1;


if (empty($Nit) != 1 && empty($NombreEmpresa) != 1) {
    if ($empresa->ingresarEmpresa($Nit, $NombreEmpresa, $Estado)) {
        $modal->modalAlerta("text-primary","Informacion", "La empresa se ha registrado exitosamente.");
    } else {
        $modal->modalAlerta("text-danger","Informacion", "La empresa no se puede registrar");
    }
} else {
    $modal->modalAlerta("text-warning","Informacion", "Todos los campos son requeridos.");
}

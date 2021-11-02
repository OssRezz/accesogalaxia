<?php

require_once '../Modelo/ModeloAdmin.php';
require '../../componentes/Modal.php';

$admin = new Admin();
$modal =  new Modal();

$nit = $_POST['nitEmpresa'];
$empNit = $_POST['empId'];
$nombre = $_POST['empNombre'];
$estado = $_POST['empEstado'];


$Nit = rtrim($nit, " ");
$Nombre = rtrim($nombre, " ");


if (empty($Nit) != 1 && empty($Nombre) != 1) {
    if ($admin->updateEmpresa($nit, $nombre, $estado)) {
        $modal->modalAlerta("text-primary", "Informacion", "La empresa se ha actualizado exitosamente.");
    } else {
        $modal->modalAlerta("text-danger", "Informacion", "La empresa no se puede actualizar.");
    }
} else {
    $modal->modalAlerta("text-warning", "Informacion", "Todos los campos son requeridos.");
}

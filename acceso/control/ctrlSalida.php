<?php

require '../Modelo/ModeloAcceso.php';
require '../../componentes/Modal.php';
date_default_timezone_set("America/Bogota");


$acceso = new Acceso();
$modal =  new Modal();

$id = $_POST['id'];
$horaSalida = $Tiempo = date("h:i");
$fechaSalida = date('Y-m-d');

if ($acceso->actalizarSalida($id, $fechaSalida, $horaSalida)) {
    $modal->modalAlerta("text-primary", "Informaciòn", "Salida registrada.");
}

<?php

require '../Modelo/ModeloAcceso.php';
require '../../componentes/Modal.php';
date_default_timezone_set("America/Bogota");

$acceso =  new Acceso();
$modal =  new Modal();

$fechaEntrada = $_POST['fechaEntrada'];
$horaEntrada = $Tiempo = date("h:i");
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$rh = $_POST['tSangre'];
$tPersona = $_POST['tPersona'];
$zDestino = $_POST['zDestino'];
$empresaUser = $_POST['empresaUser'];

$origen = !empty($_POST['origen']) ? $_POST['origen'] : NULL;
$arma = !empty($_POST['serie']) ? $_POST['serie'] : NULL;
$computador = !empty($_POST['referencia']) ? $_POST['referencia'] : NULL;
$placa = !empty($_POST['placa']) ? $_POST['placa'] : NULL;

$Documento = rtrim($documento, " ");
$Nombre = rtrim($nombre, " ");
$Genero = rtrim($genero, " ");
$Rh = rtrim($rh, " ");


if (empty($Documento) != 1 && empty($Nombre) != 1 && empty($Genero) != 1 && empty($Rh) != 1) {
    $horaSalida = null;
    $fechaSalida = null;
    if ($acceso->ingresarAcceso($zDestino, $tPersona, $origen, $empresaUser, $Documento, $Nombre, $Genero, $Rh, $placa, $arma, $computador, $fechaEntrada, $horaEntrada, $fechaSalida, $horaSalida)) {
        $modal->modalAlerta("text-primary", "Informacion", "Ingreso exitosamente");
    }
} else {
    $modal->modalInformativa("text-warning", "Informacion", "Todos los campos son requeridos");
}

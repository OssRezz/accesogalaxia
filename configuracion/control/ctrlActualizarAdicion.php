<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$adiEstado = $_POST['adiEstado'];
$adiId = $_POST['adiId'];


if ($config->actualizarAdiciones($adiId, $adiEstado)) {
    $modal->modalAlerta("text-primary", "Informacion", "El campo se actualizò correctamente.");
} else {
    $modal->modalAlerta("text-danger", "Alerta", "Este campo no se puede modificar");
}

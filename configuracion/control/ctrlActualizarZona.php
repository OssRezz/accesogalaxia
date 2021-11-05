<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$zonEstado = $_POST['zonEstado'];
$zonId = $_POST['zonId'];


if ($config->actualizarZona($zonId, $zonEstado)) {
    $modal->modalAlerta("text-primary", "Informacion", "El campo se actualizò correctamente.");
} else {
    $modal->modalAlerta("text-danger", "Alerta", "Este campo no se puede modificar");
}

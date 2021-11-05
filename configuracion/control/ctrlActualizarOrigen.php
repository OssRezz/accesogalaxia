<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$oriEstado = $_POST['oriEstado'];
$oriId = $_POST['oriId'];


if ($config->actualizarOrigen($oriId, $oriEstado)) {
    $modal->modalAlerta("text-primary", "Informacion", "El campo se actualizò correctamente.");
} else {
    $modal->modalAlerta("text-danger", "Alerta", "Este campo no se puede modificar");
}

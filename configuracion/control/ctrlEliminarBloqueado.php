<?php

require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';


$modal = new Modal();
$config = new Config();

$bloId = $_POST['bloId'];

if ($config->eliminarBloqueado($bloId)) {
    $modal->modalAlerta("text-primary", "Informacion", "Persona debloqueada exitosamente.");
} else {
    $modal->modalAlerta("text-danger", "Alerta", "Esta persona se puede desbloquear.");
}

<?php
require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';

$modal = new Modal();
$config = new Config();

$oriId = $_POST['oriId'];
$Origen = $config->listaDeOrigenById($oriId);


if ($Origen != null) {
    foreach ($Origen as $Origen) {
        $estado = $Origen['oriEstado'];
    }
    //Building modal content

    $contenidoModal = "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='oriEstado'>Estado</label>";
    $contenidoModal .= "     <input type='text' id='oriId' value='$oriId' hidden>";
    $contenidoModal .= "     <select id='oriEstado' class='form-control'>";
    if ($estado === "1") {
        $contenidoModal .= "        <option value='1' selected>Activo</option>";
        $contenidoModal .= "        <option value='0'>Inactivo</option>";
    } else {
        $contenidoModal .= "        <option value='0' selected>Inactivo</option>";
        $contenidoModal .= "        <option value='1'>Activo</option>";
    }
    $contenidoModal .= "     </select>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $contenidoModal .= "<div class='form-group'> ";
    $contenidoModal .= "  <div class='col'>";
    $contenidoModal .= "    <button type='button' id='btn-actualizar-origen' class='btn btn-outline-primary btn-block rounded-0'>Actualizar origen</button>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $modal->modalForm("Actualizar origen", $contenidoModal);
}

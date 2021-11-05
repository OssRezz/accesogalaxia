<?php
require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';

$modal = new Modal();
$config = new Config();

$idZona = $_POST['idZona'];
$Zonas = $config->listaDeZonasById($idZona);


if ($Zonas != null) {
    foreach ($Zonas as $Zonas) {
        $estado = $Zonas['zonEstado'];
    }
    //Building modal content

    $contenidoModal = "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='zonEstado'>Estado</label>";
    $contenidoModal .= "     <input type='text' id='zonId' value='$idZona' hidden>";
    $contenidoModal .= "     <select id='zonEstado' class='form-control'>";
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
    $contenidoModal .= "    <button type='button' id='btn-actualizar-zona' class='btn btn-outline-primary btn-block rounded-0'>Actualizar zona</button>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $modal->modalForm("Actualizar zona", $contenidoModal);
}

<?php

require '../Modelo/ModeloAcceso.php';
require '../../componentes/Modal.php';

$acceso = new Acceso();
$modal =  new Modal();

$id = $_POST['id'];

$infoPersona = $acceso->listaAccesoById($id);

if ($infoPersona != null) {
    foreach ($infoPersona as $infoPersona) {
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
        $estado = $infoPersona['zonEstado'];
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

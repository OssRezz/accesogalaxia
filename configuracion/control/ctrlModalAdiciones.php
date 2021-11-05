<?php
require_once '../../componentes/Modal.php';
require '../Modelo/ModeloConfig.php';

$modal = new Modal();
$config = new Config();

$id = $_POST['id'];
$Adiciones = $config->listaDeAdiccionesById($id);


if ($Adiciones != null) {
    foreach ($Adiciones as $Adiciones) {
        $estado = $Adiciones['adiEstado'];
    }
    //Building modal content

    $contenidoModal = "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='adiEstado'>Estado</label>";
    $contenidoModal .= "     <input type='text' id='adiId' value='$id' hidden>";
    $contenidoModal .= "     <select id='adiEstado' class='form-control'>";
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
    $contenidoModal .= "    <button type='button' id='btn-actualizar-adicion' class='btn btn-outline-primary btn-block rounded-0'>Actualizar adicion</button>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $modal->modalForm("Actualizar adicion", $contenidoModal);
}

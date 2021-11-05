<?php
require_once '../Modelo/ModeloAdmin.php';
require_once '../../componentes/Modal.php';
$modal = new Modal();
$admin = new Admin();

$nit = $_POST['nit'];
$empresa = $admin->listaEmpresasPorNit($nit);


if ($empresa != null) {
    foreach ($empresa as $empresa) {
        $empresaNit = $empresa['empId'];
        $nombre = $empresa['empNombre'];
        $estado = $empresa['empEstado'];
    }
    //Building modal content
    $contenidoModal = "<div class='form-group'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='edadPrograma'>Nit</label>";
    $contenidoModal .= "     <input type='number' id='nitEmpresa' class='form-control' value='$empresaNit' placeholder='Nit de la empresa' hidden>";
    $contenidoModal .= "     <input type='number' id='empNit' class='form-control' value='$empresaNit' placeholder='Nit de la empresa' disabled>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";
    $contenidoModal .= "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='edadPrograma'>Nombre</label>";
    $contenidoModal .= "     <input type='text' id='empNombre' class='form-control'value='$nombre'>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $contenidoModal .= "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='edadPrograma'>Estado</label>";
    $contenidoModal .= "     <select id='empEstado' class='form-control'>";
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
    $contenidoModal .= "    <button type='button' id='btn-actualizar-empresa' class='btn btn-outline-primary btn-block rounded-0'>Actualizar empresa</button>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $modal->modalForm("Ingresar empresa", $contenidoModal);
}

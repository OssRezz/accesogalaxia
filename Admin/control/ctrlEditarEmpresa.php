<?php
require_once '../Modelo/ModeloAdmin.php';
require_once '../../componentes/Modal.php';
$nit = $_POST['empId'];
$modal = new Modal();

$admin = new Admin();
$empresa = $admin->listaEmpresasPorNit($nit);
if ($empresa != null) {
    foreach ($empresa as $empresa) {
        $empresaNit = $empresa['empId'];
        $nombre = $empresa['empNombre'];
        $estado = $empresa['empEstado'];

    }
}



//Building modal content
$contenidoModal = "<div class='form-group'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='edadPrograma'>Nit</label>";
$contenidoModal .= "     <input type='number' id='nit' class='form-control' value='<?php ?' placeholder='Nit de la empresa'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='edadPrograma'>Nombre</label>";
$contenidoModal .= "     <input type='text' id='nombreEmpresa' class='form-control' placeholder='Nombre de la empresa'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group'> ";
$contenidoModal .= "  <div class='col'>";
$contenidoModal .= "    <button type='button' id='btn-insertar-empresa' class='btn btn-outline-primary btn-block rounded-0' >Ingresar empresa</button>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='edadPrograma'>Nombre</label>";
$contenidoModal .= "     <input type='text' id='nombreEmpresa' class='form-control' placeholder='Nombre de la empresa'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$modal->modalForm("Ingresar empresa", $contenidoModal);




echo                    "<div class='form-group col-sm-12 col-md-12 mb-5'>";
echo                        "<label for='perfilUsuario'>Labor</label>";
echo                        "<select name='perfilUsuario' id='perfilUsuario' class='form-control'>";
echo                        "<option value='$id_perfil'>$nombrePerfil</option>";

foreach ($arrayPerfil as $Perfil) {
    $idPerfil =  $Perfil['id_perfil'];
    $perfil =  $Perfil['perfil'];
    echo                        "<option value='$idPerfil'>$perfil</option>";
}
echo                        "</select>";
echo                    "</div>";
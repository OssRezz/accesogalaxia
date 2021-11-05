<?php

require "../Modelo/ModeloUsuarios.php";
require "../../componentes/Modal.php";
require_once "../../sesion/Modelo/ModeloSesion.php";

$modal = new Modal();
$usuario = new Usuarios();
$sesion = new Sesion();

$idUsuario = $_POST['idUsuario'];
$Sesion = $sesion->listaDeRoles();
$listaUsuario = $usuario->listaDeUsuariosById($idUsuario);

if ($listaUsuario != null) {

    foreach ($listaUsuario as $listaUsuario) {
        $nombre = $listaUsuario['nombre'];
        $documento = $listaUsuario['documento'];
        $idPerfil = $listaUsuario['idPerfil'];
        $nombrePerfil = $listaUsuario['perfil'];
    }

    $contenidoModal = "<div class='form-group'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='nombreUsuario'>Nombre</label>";
    $contenidoModal .= "     <input type='text' id='idUsuario' value='$idUsuario' hidden>";
    $contenidoModal .= "     <input type='text' id='nombreUsuario' value='$nombre' class='form-control'>";

    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";
    $contenidoModal .= "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .= "     <label for='documentoUsuario'>Documento</label>";
    $contenidoModal .= "     <input type='number' id='documentoUsuario' value='$documento' class='form-control'>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";
    $contenidoModal .= "<div class='form-group mb-4'>";
    $contenidoModal .= " <div class='col'>";
    $contenidoModal .=     "<label for='perfilUsuario'>Perfil</label>";
    $contenidoModal .=     "<select class='form-control' value='' id='perfilUsuario'>";
    $contenidoModal .=           "<option value='$idPerfil'>$nombrePerfil</option>";


    if ($Sesion != null) {
        foreach ($Sesion as $Sesion) {
            if ($Sesion['rolId'] != $idPerfil) {
                $contenidoModal .=           "<option value='" . $Sesion['rolId'] . "'>" . $Sesion['rolPerfil'] . "</option>";
            }
        }
    }
    $contenidoModal .=       "</select>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";


    $contenidoModal .= "<div class='form-group'> ";
    $contenidoModal .= "  <div class='col'>";
    $contenidoModal .= "    <button type='button' id='btn-actualizar-usuario' class='btn btn-outline-primary btn-block rounded-0' >Actualizar usuario</button>";
    $contenidoModal .= " </div> ";
    $contenidoModal .= "</div>";

    $modal->modalForm("Actualizar Usuario", $contenidoModal);
}

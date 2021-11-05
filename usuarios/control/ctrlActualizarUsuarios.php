<?php

require "../Modelo/ModeloUsuarios.php";
require "../../componentes/Modal.php";

$modal = new Modal();
$usuario = new Usuarios();

$id = $_POST['idUsuario'];
$nombre = $_POST['nombreUsuario'];
$documento = $_POST['documentoUsuario'];
$perfil = $_POST['perfilUsuario'];


$Nombre = rtrim($nombre, " ");
$Documento = rtrim($documento, " ");
$Perfil = rtrim($perfil, " ");
try {
    if (empty($Nombre) != 1 && empty($Documento) != 1) {
        if ($usuario->actualizarUsuarios($id, $Perfil, $Nombre, $Documento)) {
            $modal->modalAlerta('text-primary', 'Información', 'El usuario a sido actualizado de forma exitosa');
        }
    } else {
        $modal->modalInformativa('text-warning', 'Alerta', 'Todos los campos son requeridos');
    }
} catch (PDOException $e) {
    $modal->modalInformativa('text-danger', 'Alerta', 'El usuario no se puede actualizar');
}

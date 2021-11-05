<?php 

require "../Modelo/ModeloUsuarios.php";
require "../../componentes/Modal.php";

$modal = new Modal();
$usuario = new Usuarios();

$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$password = $_POST['password'];
$perfil = $_POST['perfil'];
$empresa = $_POST['empresa'];
$fecha = date('Y-m-d');
if ($perfil === '1') {
    $avatar="admin.png";
}elseif ($perfil === '2') {
    $avatar="client.png";
}elseif ($perfil === '3') {
    $avatar="guard.png";
}else {
    $avatar="default.png";
}

$Nombre= rtrim($nombre, " ");
$Documento= rtrim($documento, " ");
$Password= rtrim($password, " ");
$Perfil= rtrim($perfil, " ");
$Empresa= rtrim($empresa, " ");

if (empty($Nombre) != 1 && empty($Documento) != 1 && empty($Password) != 1) {
    if ($usuario->insertarUsuarios($Perfil, $Empresa, $Nombre, $Documento, password_hash($Password, PASSWORD_DEFAULT), $fecha, $avatar)) {
            $modal->modalAlerta('text-primary', 'Información', 'El usuario a sido ingresado de forma exitosa');
    }else {
        $modal->modalAlerta('text-danger', 'Alerta', 'Este usuario no se puede ingresar');
    }
}else {
    $modal->modalInformativa('text-warning', 'Alerta', 'Todos los campos son requeridos');
}

?>
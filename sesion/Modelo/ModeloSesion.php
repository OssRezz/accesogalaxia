<?php

require_once '../../conexion.php';
session_start();

class Sesion extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }


    public function iniciarSesion($useDocumento)
    {
        $statement = $this->db->prepare("SELECT * FROM `tblusers` WHERE useDocumento= :useDocumento LIMIT 1");
        $statement->bindParam(":useDocumento", $useDocumento);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $consulta = $statement->fetch();
            $_SESSION['idUsuario'] = $consulta['useId'];
            $_SESSION['nombre'] = $consulta['useNombre'];
            $_SESSION['empresa'] = $consulta['fkEmpresa'];
            $_SESSION['rol'] = $consulta['fkRol'];
            $_SESSION['avatar'] = $consulta['useAvatar'];
            return true;
        }
        return false;
    }

    public function getUsuario()
    {
        if ($_SESSION['nombre'] != null) {

            $Separador = str_replace(" ", ' ', $_SESSION['nombre']);
            $usuarioArray = preg_split("/\ /", $Separador);
            if (count($usuarioArray) >= 2) {
                $user = $usuarioArray[0] . " " . $usuarioArray[1];
            } else {
                $user = $_SESSION['nombre'];
            }
            return $user;
        } else {
            header('Location: ../../index.php');
        }
    }

    public function getAvatar()
    {
        if ($_SESSION['avatar'] != null) {

            $avatar = $_SESSION['avatar'];
            return $avatar;
        } else {
            $avatar = 'default.png';
        }
    }

    public function getEmpresa()
    {
        if ($_SESSION['empresa'] != null) {
            $empresa = $_SESSION['empresa'];
        }
        return $empresa;
    }


    public function getPerfil()
    {
        if ($_SESSION['rol'] != null) {
            $perfil = $_SESSION['rol'];
        }
        return $perfil;
    }

    public function getIdUsuario()
    {
        if ($_SESSION['idUsuario'] != null) {
            $idUsuario = $_SESSION['idUsuario'];
        }
        return $idUsuario;
    }

    public function listaDeRoles()
    {
        $listaDeRoles = null;
        $statement = $this->db->prepare("SELECT * FROM tblroles");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeRoles[] = $consulta;
        }
        return $listaDeRoles;
    }

    public function UserVerify($documento)
    {
        $listUserVerify = null;
        $statement = $this->db->prepare("SELECT * FROM tblusers WHERE useDocumento=:documento LIMIT 1");
        $statement->bindParam(":documento", $documento);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listUserVerify[] = $consulta;
        }
        return $listUserVerify;
    }
}

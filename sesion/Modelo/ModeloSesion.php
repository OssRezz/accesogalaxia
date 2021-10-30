<?php

require_once '../../conexion.php';
session_start();

class Sesion extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }


    public function iniciarSesion($useDocumento, $usePassword)
    {
        $statement = $this->db->prepare("SELECT * FROM `tblusers` WHERE useDocumento= :useDocumento AND usePassword= :usePassword");
        $statement->bindParam(":useDocumento", $useDocumento);
        $statement->bindParam(":usePassword", $usePassword);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $consulta = $statement->fetch();
            $_SESSION['nombre'] = $consulta['useNombre'];
            $_SESSION['empresa'] = $consulta['fkEmpresa'];
            $_SESSION['rol'] = $consulta['fkRol'];
            $_SESSION['avatar'] = $consulta['useAvatar'];
            return true;
        }
        return false;
    }
}

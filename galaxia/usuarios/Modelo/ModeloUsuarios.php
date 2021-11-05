<?php
require_once "../../conexion.php";

class Usuarios extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertarUsuarios($rol, $empresa, $nombre, $documento, $password, $fechar,$avatar){
        $statement=$this->db->prepare("INSERT INTO `tblusers`(`fkRol`, `fkEmpresa`, `useNombre`, `useDocumento`, `usePassword`, `useFechaR`, `useAvatar`) 
        VALUES (:rol, :empresa, :nombre, :documento, :password, :fechar, :avatar)");
        $statement->bindParam(':rol', $rol);
        $statement->bindParam(':empresa', $empresa);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':fechar', $fechar);
        $statement->bindParam(':avatar', $avatar);
        if ($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function listaDeUsuarios()
    {
        $listaDeUsuarios = null;
        $statement = $this->db->prepare("SELECT * FROM tblusers");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeUsuarios[] = $consulta;
        }
        return $listaDeUsuarios;
    }

}

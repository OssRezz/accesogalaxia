<?php
require_once "../../conexion.php";

class Usuarios extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertarUsuarios($rol, $empresa, $nombre, $documento, $password, $fechar, $avatar)
    {
        $statement = $this->db->prepare("INSERT INTO `tblusers`(`fkRol`, `fkEmpresa`, `useNombre`, `useDocumento`, `usePassword`, `useFechaR`, `useAvatar`) 
        VALUES (:rol, :empresa, :nombre, :documento, :password, :fechar, :avatar)");
        $statement->bindParam(':rol', $rol);
        $statement->bindParam(':empresa', $empresa);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':documento', $documento);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':fechar', $fechar);
        $statement->bindParam(':avatar', $avatar);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarUsuarios($id, $perfil, $nombre, $documento)
    {
        $statement = $this->db->prepare("UPDATE `tblusers` SET `useNombre`=:nombre,`useDocumento`=:documento,
         fkRol=:perfil WHERE useId=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':perfil', $perfil);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':documento', $documento);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listaDeUsuarios()
    {
        $listaDeUsuarios = null;
        $statement = $this->db->prepare("SELECT useId as 'id', useDocumento as 'documento', useNombre as 'nombre',  E.empNombre as 'empresa' , R.rolPerfil as 'perfil' FROM `tblusers`
        INNER JOIN tblempresas AS E ON E.empId=tblusers.fkEmpresa
        INNER JOIN tblroles AS R ON R.rolId=tblusers.fkRol");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeUsuarios[] = $consulta;
        }
        return $listaDeUsuarios;
    }

    public function listaDeUsuariosById($id)
    {
        $listaDeUsuariosById = null;
        $statement = $this->db->prepare("SELECT useId as 'id', useDocumento as 'documento', useNombre as 'nombre',  E.empNombre as 'empresa' ,
         fkRol as 'idPerfil', R.rolPerfil as 'perfil' FROM `tblusers` INNER JOIN tblempresas AS E ON E.empId=tblusers.fkEmpresa
        INNER JOIN tblroles AS R ON R.rolId=tblusers.fkRol WHERE useId= :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeUsuariosById[] = $consulta;
        }
        return $listaDeUsuariosById;
    }
}

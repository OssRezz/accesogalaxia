<?php

require_once '../../conexion.php';


class Config extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertarZona($fkEmpresa, $zonNombre)
    {
        $statement = $this->db->prepare("INSERT INTO `tblzonas`(`fkEmpresa`, `zonNombre`)
         VALUES (:fkEmpresa,:zonNombre)");
        $statement->bindParam(':fkEmpresa', $fkEmpresa);
        $statement->bindParam(':zonNombre', $zonNombre);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insetarOrigen($fkEmpresa, $oriOrigen)
    {
        $statement = $this->db->prepare("INSERT INTO `tblorigenes`(`fkEmpresa`, `oriOrigen`)
         VALUES (:fkEmpresa,:oriOrigen)");
        $statement->bindParam(':fkEmpresa', $fkEmpresa);
        $statement->bindParam(':oriOrigen', $oriOrigen);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function bloquearPersona($bloDocumento, $bloEstado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblbloqueados`(`bloDocumento`, `bloEstado`)
         VALUES (:bloDocumento,:bloEstado)");
        $statement->bindParam(':bloDocumento', $bloDocumento);
        $statement->bindParam(':bloEstado', $bloEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cambiarPassword($useId, $usePassword)
    {
        $statement = $this->db->prepare("UPDATE `tblusers` SET `usePassword`=:usePassword WHERE useId=:useId");
        $statement->bindParam(':useId', $useId);
        $statement->bindParam(':usePassword', $usePassword);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listaDeAdicciones()
    {
        $listaDeAdicciones = null;
        $statement = $this->db->prepare("SELECT * FROM tbladiciones");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeAdicciones[] = $consulta;
        }
        return $listaDeAdicciones;
    }

    public function listaDeZonasByEmpresa($empresa)
    {
        $listaDeZonasByEmpresa = null;
        $statement = $this->db->prepare("SELECT E.empNombre, Z.zonNombre FROM `tblzonas` AS Z
        INNER JOIN tblempresas as E on E.empId=Z.fkEmpresa
        WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeZonasByEmpresa[] = $consulta;
        }
        return $listaDeZonasByEmpresa;
    }

    public function listaDeOrigenesByEmpresa($empresa)
    {
        $listaDeZonasByEmpresa = null;
        $statement = $this->db->prepare("SELECT E.empNombre, O.oriOrigen FROM `tblorigenes` AS O
        INNER JOIN tblempresas AS E on E.empId=O.fkEmpresa
        WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeZonasByEmpresa[] = $consulta;
        }
        return $listaDeZonasByEmpresa;
    }
}

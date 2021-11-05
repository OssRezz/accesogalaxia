<?php

require_once '../../conexion.php';


class Config extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }


    //Funciones de zonas
    public function insertarZona($fkEmpresa, $zonNombre, $zonEstado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblzonas`(`fkEmpresa`, `zonNombre`,`zonEstado`)
         VALUES (:fkEmpresa,:zonNombre,:zonEstado)");
        $statement->bindParam(':fkEmpresa', $fkEmpresa);
        $statement->bindParam(':zonNombre', $zonNombre);
        $statement->bindParam(':zonEstado', $zonEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listaDeZonasByEmpresa($empresa)
    {
        $listaDeZonasByEmpresa = null;
        $statement = $this->db->prepare("SELECT Z.zonId,Z.zonEstado, E.empNombre, Z.zonNombre FROM `tblzonas` AS Z
        INNER JOIN tblempresas as E on E.empId=Z.fkEmpresa
        WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeZonasByEmpresa[] = $consulta;
        }
        return $listaDeZonasByEmpresa;
    }

    public function listaDeZonasById($id)
    {
        $listaDeZonasById = null;
        $statement = $this->db->prepare("SELECT Z.zonId,Z.zonEstado, E.empNombre, Z.zonNombre FROM `tblzonas` AS Z
        INNER JOIN tblempresas as E on E.empId=Z.fkEmpresa
        WHERE zonId=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeZonasById[] = $consulta;
        }
        return $listaDeZonasById;
    }

    public function actualizarZona($id, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tblzonas` SET zonEstado=:estado WHERE zonId=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //Fin deFunciones de zonas


    //Inicio funciones tabla origen
    //Ingresar un  origen
    public function insetarOrigen($fkEmpresa, $oriOrigen, $oriEstado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblorigenes`(`fkEmpresa`, `oriOrigen`, `oriEstado`)
         VALUES (:fkEmpresa,:oriOrigen,:oriEstado)");
        $statement->bindParam(':fkEmpresa', $fkEmpresa);
        $statement->bindParam(':oriOrigen', $oriOrigen);
        $statement->bindParam(':oriEstado', $oriEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listaDeOrigenesByEmpresa($empresa)
    {
        $listaDeZonasByEmpresa = null;
        $statement = $this->db->prepare("SELECT O.oriId, O.oriEstado, E.empNombre, O.oriOrigen FROM `tblorigenes` AS O
        INNER JOIN tblempresas AS E on E.empId=O.fkEmpresa
        WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeZonasByEmpresa[] = $consulta;
        }
        return $listaDeZonasByEmpresa;
    }

    public function listaDeOrigenById($id)
    {
        $listaDeOrigenById = null;
        $statement = $this->db->prepare("SELECT O.oriId, O.oriEstado, E.empNombre, O.oriOrigen FROM `tblorigenes` AS O
        INNER JOIN tblempresas AS E on E.empId=O.fkEmpresa
        WHERE oriId=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeOrigenById[] = $consulta;
        }
        return $listaDeOrigenById;
    }

    public function actualizarOrigen($id, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tblorigenes` SET oriEstado=:estado WHERE oriId=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //fin de funciones origen

    public function bloquearPersona($empresa, $bloDocumento, $bloEstado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblbloqueados`(`fkEmpresa`,`bloDocumento`, `bloEstado`)
         VALUES (:empresa,:bloDocumento,:bloEstado)");
        $statement->bindParam(':empresa', $empresa);
        $statement->bindParam(':bloDocumento', $bloDocumento);
        $statement->bindParam(':bloEstado', $bloEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarBloqueado($id)
    {
        $statement = $this->db->prepare("DELETE FROM tblbloqueados WHERE bloId=:id");
        $statement->bindParam(':id', $id);
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

    public function ListaDeBloqueados($empresa)
    {
        $ListaDeBloqueados = null;
        $statement = $this->db->prepare("SELECT * FROM tblbloqueados WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $ListaDeBloqueados[] = $consulta;
        }
        return $ListaDeBloqueados;
    }

    public function actualizarAdiciones($id, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tbladiciones` SET adiEstado=:estado WHERE adiId=:id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function salidaTotal($id, $empresa, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tbladiciones` SET adiEstado=:estado WHERE adiId=:id AND fkEmpresa=:empresa");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':empresa', $empresa);
        $statement->bindParam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function listaDeAdicciones($empresa)
    {
        $listaDeAdicciones = null;
        $statement = $this->db->prepare("SELECT A.adiId,E.empNombre, A.adiCampo, A.adiEstado FROM `tbladiciones` AS A
        INNER JOIN tblempresas AS E ON E.empId=A.fkEmpresa
        WHERE fkEmpresa=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeAdicciones[] = $consulta;
        }
        return $listaDeAdicciones;
    }

    public function listaDeAdiccionesById($id)
    {
        $listaDeAdiccionesById = null;
        $statement = $this->db->prepare("SELECT E.empNombre, A.adiCampo, A.adiEstado FROM `tbladiciones` AS A
        INNER JOIN tblempresas AS E ON E.empId=A.fkEmpresa
        WHERE adiId=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeAdiccionesById[] = $consulta;
        }
        return $listaDeAdiccionesById;
    }
}

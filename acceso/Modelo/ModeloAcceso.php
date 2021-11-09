<?php
require_once '../../conexion.php';

class Acceso extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaAdicciones($empresa)
    {
        $listaDeAdicciones = null;
        $statement = $this->db->prepare("SELECT * FROM `tbladiciones` WHERE fkEmpresa=:empresa");
        $statement->bindParam(":empresa", $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDeAdicciones[] = $consulta;
        }
        return $listaDeAdicciones;
    }

    public function listaDePersonas()
    {
        $listaDePersonas = null;
        $statement = $this->db->prepare("SELECT * FROM `tbltipopersonas`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaDePersonas[] = $consulta;
        }
        return $listaDePersonas;
    }

    public function listaAccesoByDoc($documento)
    {
        $listaAccesoByDoc = null;
        $statement = $this->db->prepare("SELECT * FROM `tblaccesos` WHERE accDocumento=:documento LIMIT 1");
        $statement->bindParam(":documento", $documento);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAccesoByDoc[] = $consulta;
        }
        return $listaAccesoByDoc;
    }

    public function listaAccesoById($id)
    {
        $listaAccesoByDoc = null;
        $statement = $this->db->prepare("SELECT * FROM `tblaccesos` WHERE accId=:id LIMIT 1");
        $statement->bindParam(":id", $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAccesoByDoc[] = $consulta;
        }
        return $listaAccesoByDoc;
    }

    public function listaAccesos($empresa)
    {
        $listaAccesos = null;
        $statement = $this->db->prepare("SELECT `accId`,`fkEmpresa`,`accDocumento`, `accNombre`, `accFechaEntrada`,
         `accHoraEntrada`, `accFechaSalida`, `accHoraSalida` FROM `tblaccesos`
        WHERE fkEmpresa=:empresa
        ORDER BY accId  DESC");
        $statement->bindParam(":empresa", $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaAccesos[] = $consulta;
        }
        return $listaAccesos;
    }

    public function actalizarSalida($id, $fechaSalida, $horaSalida)
    {
        $statement = $this->db->prepare("UPDATE `tblaccesos` SET `accFechaSalida`=:fechaSalida,
        `accHoraSalida`=:horaSalida WHERE accId=:id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":fechaSalida", $fechaSalida);
        $statement->bindParam(":horaSalida", $horaSalida);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function ingresarAcceso($fkZona, $fkPersona, $fkOrigen, $fkEmpresa, $documento, $nombre, $genero, $rh, $placa, $arma, $computador, $fechaEntrada, $horaEntrada, $fechaSalida, $horaSalida)
    {
        $statement = $this->db->prepare('INSERT INTO `tblaccesos`(`fkZona`, `fkPersona`, `fkOrigen`,
         `fkEmpresa`, `accDocumento`, `accNombre`, `accGenero`, `accRh`, `accPlaca`, `accArma`,
          `accPc`, `accFechaEntrada`, `accHoraEntrada`, `accFechaSalida`, `accHoraSalida`)
           VALUES (:fkZona,:fkPersona,:fkOrigen,:fkEmpresa,:documento,:nombre,:genero,:rh,:placa,
           :arma,:computador,:fechaEntrada,:horaEntrada,:fechaSalida,:horaSalida)');
        $statement->bindParam(":fkZona", $fkZona);
        $statement->bindParam(":fkPersona", $fkPersona);
        $statement->bindParam(":fkOrigen", $fkOrigen);
        $statement->bindParam(":fkEmpresa", $fkEmpresa);
        $statement->bindParam(":documento", $documento);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":genero", $genero);
        $statement->bindParam(":genero", $genero);
        $statement->bindParam(":rh", $rh);
        $statement->bindParam(":placa", $placa);
        $statement->bindParam(":arma", $arma);
        $statement->bindParam(":computador", $computador);
        $statement->bindParam(":fechaEntrada", $fechaEntrada);
        $statement->bindParam(":horaEntrada", $horaEntrada);
        $statement->bindParam(":fechaSalida", $fechaSalida);
        $statement->bindParam(":horaSalida", $horaSalida);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

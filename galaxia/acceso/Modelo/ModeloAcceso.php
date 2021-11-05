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
}

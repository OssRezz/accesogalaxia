<?php

require_once '../../conexion.php';

class Admin extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listaDeEmpresas()
    {
        $listaEmpresas = null;
        $statement = $this->db->prepare('SELECT * tblempresas');
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpresas[] = $consulta;
        }
        return $listaEmpresas;
    }
}

<?php

require_once '../../conexion.php';

class Reportes extends Conexion
{
    public function __construct()
    {
        $this->db = parent::__construct();
    }


}

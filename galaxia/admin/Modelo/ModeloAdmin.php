<?php

require_once '../../conexion.php';

class Admin extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    /**
     * listaDeEmpresas
     * 
     *Lista de todas las empresas registradas

     * @return array
     */
    public function listaDeEmpresas()
    {
        $listaEmpresas = null;
        $statement = $this->db->prepare("SELECT * FROM tblempresas");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpresas[] = $consulta;
        }
        return $listaEmpresas;
    }

    /**
     * listaEmpresasPorNit
     *
     * Lista una empresa, segundo el NIT.
     * Recibe el NIT de la empresa como parametro.
     * 
     * @param  mixed $empresa
     * @return array
     */
    public function listaEmpresasPorNit($empresa)
    {
        $listaEmpresasPorNit = null;
        $statement = $this->db->prepare("SELECT * FROM tblempresas WHERE empId=:empresa");
        $statement->bindParam(':empresa', $empresa);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listaEmpresasPorNit[] = $consulta;
        }
        return $listaEmpresasPorNit;
    }

    /**
     * ingresarEmpresa
     *
     * Funcion para ingresar una empresa.
     * 
     * Recibe como parametro el NIT de la empresa, nombre y estado.
     * 
     * @param  mixed $empId
     * @param  mixed $empNombre
     * @param  mixed $empEstado
     * @return void
     */
    public function ingresarEmpresa($empId, $empNombre, $empEstado)
    {
        $statement = $this->db->prepare('INSERT INTO `tblempresas`(`empId`, `empNombre`, `empEstado`) VALUES (:empId,:empNombre,:empEstado)');
        $statement->bindParam(':empId', $empId);
        $statement->bindParam(':empNombre', $empNombre);
        $statement->bindParam(':empEstado', $empEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * updateEmpresa
     * 
     * Actualiza una empresa
     * recibe como parametros:
     * El Nit de la empresa
     * Nombre y estado. 
     * 
     * Se crea un campo con el nuevo nit para mantener el antiguo en caso de que deseaen modificarlo.
     *
     * @param  mixed $nit
     * @param  mixed $empId
     * @param  mixed $empNombre
     * @param  mixed $empEstado
     * @return void
     */
    public function updateEmpresa($nit, $empNombre, $empEstado)
    {
        $statement = $this->db->prepare("UPDATE `tblempresas` SET `empId`=:nit,`empNombre`=:empNombre,`empEstado`=:empEstado WHERE empId=:nit");
        $statement->bindParam(':nit', $nit);
        $statement->bindParam(':empNombre', $empNombre);
        $statement->bindParam(':empEstado', $empEstado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

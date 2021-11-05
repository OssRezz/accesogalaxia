<?php

require_once '../../componentes/Modal.php';

$modal = new Modal();

//Building modal content
$contenidoModal = "<div class='form-group'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='edadPrograma'>Nit</label>";
$contenidoModal .= "     <input type='number' id='nit' class='form-control' placeholder='Nit de la empresa'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='edadPrograma'>Nombre</label>";
$contenidoModal .= "     <input type='text' id='nombreEmpresa' class='form-control' placeholder='Nombre de la empresa'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group'> ";
$contenidoModal .= "  <div class='col'>";
$contenidoModal .= "    <button type='button' id='btn-insertar-empresa' class='btn btn-outline-primary btn-block rounded-0' >Ingresar empresa</button>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$modal->modalForm("Ingresar empresa", $contenidoModal);

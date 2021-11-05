<?php

require_once '../../componentes/Modal.php';
$modal = new Modal();

//Building modal content

$contenidoModal = "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='zonaNombre'>Origen del visitante</label>";
$contenidoModal .= "     <input type='text' id='origenNombre' class='form-control' placeholder='Nombre de origen del visitante'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group'> ";
$contenidoModal .= "  <div class='col'>";
$contenidoModal .= "    <button type='button' id='btn-ingresar-origen' class='btn btn-outline-primary btn-block rounded-0' >Ingresar origen</button>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$modal->modalForm("Ingresar origen", $contenidoModal);

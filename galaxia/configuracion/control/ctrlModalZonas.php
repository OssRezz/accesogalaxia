<?php

require_once '../../componentes/Modal.php';
$modal = new Modal();

//Building modal content

$contenidoModal = "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='zonaNombre'>Zona de destino</label>";
$contenidoModal .= "     <input type='text' id='zonaNombre' class='form-control' placeholder='Nombre de la zona de destino'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group'> ";
$contenidoModal .= "  <div class='col'>";
$contenidoModal .= "    <button type='button' id='btn-ingresar-zona' class='btn btn-outline-primary btn-block rounded-0' >Ingresar zona</button>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$modal->modalForm("Ingresar zona", $contenidoModal);

<?php

require_once '../../componentes/Modal.php';
$modal = new Modal();

//Building modal content

$contenidoModal = "<div class='form-group mb-4'>";
$contenidoModal .= " <div class='col'>";
$contenidoModal .= "     <label for='documento'>Bloquear ingreso</label>";
$contenidoModal .= "     <input type='text' id='documento' class='form-control' placeholder='Ingrese el documento de identificiòn'>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$contenidoModal .= "<div class='form-group'> ";
$contenidoModal .= "  <div class='col'>";
$contenidoModal .= "    <button type='button' id='btn-bloquear-persona'  class='btn btn-outline-primary btn-block rounded-0' >Bloquear persona</button>";
$contenidoModal .= " </div> ";
$contenidoModal .= "</div>";

$modal->modalForm("Bloquear ingreso", $contenidoModal);

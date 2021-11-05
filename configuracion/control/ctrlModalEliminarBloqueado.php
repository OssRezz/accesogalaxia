<?php

require_once '../../componentes/Modal.php';
$modal = new Modal();

$idBloqueado = $_POST['idBloqueado'];
//Building modal content

$contenidoModal = "<div class='form-group mb-4'>";
$contenidoModal .= " <p class='text-dark'>¿Desbloquear visitante?<p>";
$contenidoModal .= "</div>";

$contenidoFooter = "<button type='button' id='cancelar' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";
$contenidoFooter .=  "<button type='button' id='btn-desbloquear' value='" . $idBloqueado . "' class='btn btn-danger'>Aceptar</button>";


$modal->modalEliminar("Alerta", $contenidoModal, $contenidoFooter);

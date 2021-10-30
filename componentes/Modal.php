<?php

class Modal
{
    public function modalInformativa($color, $tituloModal, $contenidoModal)
    {
        echo "<div class='modal fade' id='modalInfo' tabindex='-1' aria-labelledby='modalInfo' aria-hidden='true'  style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header border-0 '>";
        echo "        <h5 class='modal-title $color' id='modalInfo'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='close' data-dismiss='modal' id='close' aria-label='Close'>";
        echo "          <span aria-hidden='true'>&times;</span>";
        echo "        </button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo $contenidoModal;
        echo "      </div>";
        echo "      <div class='modal-footer'>";
        echo "        <button type='button'  data-dismiss='modal' class='btn  btn-primary rounded-0' id='aceptar'>Aceptar</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInfo').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
        echo "<script>$('#aceptar').click(function(){location.reload()});</script>";
    }
}

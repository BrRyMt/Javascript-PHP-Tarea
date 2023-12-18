<?php
require_once "../model/Alignment.php";

if (isset($_POST['operacion'])) {

    $alingment = new Alineacion();

    if ($_POST['operacion'] == 'GrupoHeroe') {

        $respuesta = $alingment->GrupoHeroe();

        echo json_encode($respuesta);
    }
}


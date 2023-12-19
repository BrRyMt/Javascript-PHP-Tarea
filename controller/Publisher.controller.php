<?php
require_once "../model/Publisher.php";

if (isset($_GET['operacion'])) {
    $publisher = new Publisher();

    if ($_GET['operacion'] == 'listar') {
        $resultado = $publisher->GetPublisher();
        echo json_encode($resultado);
    }
}

if (isset($_POST['operacion'])) {
    $publisher = new Publisher();

    if ($_POST['operacion'] == 'BuscarP') {
        $resultado = $publisher->GetSuperHeroP(["publisher_id" => $_POST['publisher_id']]);
        echo json_encode($resultado);
    }


    if ($_POST['operacion'] == 'Alineacion') {
        $resultado = $publisher->AlineacionPubliser(["publisher_id" => $_POST['publisher_id']]);
        echo json_encode($resultado);
    }

    if ($_POST['operacion'] == 'listadoherores') {
        $resultado = $publisher->agrupacionheroespubliser(["publisher_id" => $_POST['publisher_id']]);
        echo json_encode($resultado);
    }
}

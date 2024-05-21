<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("initialcharge_model.php");

$ic = new InitialCharge();

$brand  = (isset($_POST['brand'])) ? $_POST['brand'] : '';

switch ($_GET["op"]) {
    case 'region':
        $dato = array();
        $data = $ic->getDataRegion();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']     = $data['id'];
            $sub_array['region'] = $data['region'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'brand':
        $dato = array();
        $data = $ic->getDataBrand();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['brand'] = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'model':
        $dato = array();
        $condition = ($brand) ? ' WHERE A.brand='.$brand : '' ;
        $data = $ic->getDataModel($condition);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['model'] = $data['model'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    default:
        header("Location: ../../../");
        die();
        break;
}
<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("vehicle_model.php");

$vehicle = new Vehicle();

$plate  = (isset($_POST['plate'])) ? $_POST['plate'] : '';
$region     = (isset($_POST['region'])) ? $_POST['region'] : '';
$brand = (isset($_POST['brand'])) ? $_POST['brand'] : '';
$model  = (isset($_POST['model'])) ? $_POST['model'] : '';
$anno   = (isset($_POST['anno'])) ? $_POST['anno'] : '';
$cost = (isset($_POST['cost'])) ? $_POST['cost'] : '';
$status  = (isset($_POST['status'])) ? $_POST['status'] : '';
$anno   = (isset($_POST['anno'])) ? $_POST['anno'] : '';


switch ($_GET["op"]) {    
    case 'showall':
        $dato = array();
        $data = $vehicle->getDataVehicleAll();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']   = $data['id'];
            $sub_array['plate']   = $data['plate'];
            $sub_array['region'] = $data['region'];
            $sub_array['brand'] = $data['brand'];
            $sub_array['model']   = $data['model'];
            $sub_array['anno']  = $data['anno'];
            $sub_array['cost']     = number_format($data['cost'],2);
            $sub_array['descrip']  = $data['description'];
            $sub_array['ids']  = $data['ids'];
            $sub_array['status']   = $data['status'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'status':
        $dato = array();
        $data = $vehicle->getDataVehicleStatus();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']   = $data['id'];
            $sub_array['status']   = $data['status'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        header("Location: ../../../");
        die();
        break;
}
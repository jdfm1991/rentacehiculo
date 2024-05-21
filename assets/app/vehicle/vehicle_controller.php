<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("vehicle_model.php");

$vehicle = new Vehicle();

$id     = (isset($_POST['id'])) ? $_POST['id'] : '';
$plate  = (isset($_POST['plate'])) ? $_POST['plate'] : '';
$region = (isset($_POST['region'])) ? $_POST['region'] : '';
$brand  = (isset($_POST['brand'])) ? $_POST['brand'] : '';
$model  = (isset($_POST['model'])) ? $_POST['model'] : '';
$anno   = (isset($_POST['anno'])) ? $_POST['anno'] : '';
$cost   = (isset($_POST['cost'])) ? $_POST['cost'] : '';
$status = (isset($_POST['status'])) ? $_POST['status'] : '';
$descrip= (isset($_POST['descrip'])) ? $_POST['descrip'] : '';


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

    case 'register':
        $dato = array();
        $data = $vehicle->getDataVehicleByPlate($plate);
        if ($data > 0) {
            $dato['status']  = false;
            $dato['message'] = 'Ya Existe Vehiculo Registrado Con Esta Matricula';
        } else {
            $id = uniqid();
            $upload = false;
            $nfiles = count($_FILES['carimg']['name']);
            $path = "../../img/vehicle/";
            $vehic = $vehicle->setDataVehicle($id,$plate,$region,$brand,$model,$anno,$cost,$status,$descrip);
                if ($vehic) {
                    $dato['status']  = true;
                    $dato['message'] = 'Se Guardaron La Informacion de Manera Satisfactoria';
                } else {
                    $dato['status']  = false;
                    $dato['message'] = 'Error al Guardar La Informacion';
                }
            //INICIO DE OPERACION PARA CARGAR Y GUARDAR IMAGENES
            for($index = 0;$index < $nfiles;$index++){
                // File name
                $filename = $_FILES['carimg']['name'][$index];
                // Get extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");
                // Check extension
                if(in_array($ext, $valid_ext)){
                    // File path
                    $newpath = $path.$filename;
                    // Upload file
                    $upload = move_uploaded_file($_FILES['carimg']['tmp_name'][$index],$newpath);
                    if ($upload) {
                        $image = $vehicle->setDataVehicleImage($id,$filename);
                        if ($image) {
                            $dato['statusi']  = true;
                            $dato['messagei'] = 'Se Guardaron Las Imagenes de Manera Satisfactoria';
                        } else {
                            $dato['statusi']  = false;
                            $dato['messagei'] = 'Error al Guardar Las Imagenes';
                        }
                    } else {
                        $dato['status']  = false;
                        $dato['message'] = 'Error Al Cargar Imagenes';
                    } 
                }
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        header("Location: ../../../");
        die();
        break;
}
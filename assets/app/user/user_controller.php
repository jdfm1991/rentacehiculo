<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("../../../env.php");
require_once("user_model.php");

$client = new Client();

$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$option = (isset($_POST['option'])) ? $_POST['option'] : '1';


switch ($_GET["op"]) {
    case 'client':
        $dato = array();
        $data = $client->getDataUser($user);
        $data2 = $client->getOptionUser($option);
        foreach ($data as $data) {
            $dato['nameu']  = $data['nameu'];
            $dato['phone']  = $data['phone'];
            $dato['dni']    = $data['dni'];
            $dato['imgdni'] = $data['imgdni'];
            $dato['status'] = $data['status'];
        }
        foreach ($data2 as $data2) {
            $dato['brand']  = $data2['brand'];
            $dato['model']  = $data2['model'];
            $dato['anno']   = $data2['anno'];
            $dato['plate']  = $data2['plate'];
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;
    
    case 'show':
        $dato = array();
        $data = $client->getDataProfile($user);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['nameu']   = $data['nameu'];
            $sub_array['address'] = $data['address'];
            $sub_array['imguser'] = $data['imguser'];
            $sub_array['phone']   = $data['phone'];
            $sub_array['letter']  = $data['letter'];
            $sub_array['dni']     = $data['dni'];
            $sub_array['imgdni']  = $data['imgdni'];
            $sub_array['status']  = $data['status'];
            $sub_array['email']   = $data['email'];
            $sub_array['passw']   = $data['passw'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        # code...
        break;
}
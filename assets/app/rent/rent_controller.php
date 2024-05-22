<?php
session_name('R3nt@k4r');
session_start();
date_default_timezone_set('America/Caracas');

require_once("../../../conection.php");
require_once("../../../env.php");
require_once("rent_model.php");

$rent = new Rent();

$now = date('Y-m-d h:m:s');
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$fechar = (isset($_POST['fechar'])) ? $_POST['fechar'] : '';
$fechae = (isset($_POST['fechae'])) ? $_POST['fechae'] : '';
$dias = (isset($_POST['dias'])) ? $_POST['dias'] : '';
$mont = (isset($_POST['mont'])) ? $_POST['mont'] : '';
$condition = (isset($_POST['condition'])) ? $_POST['condition'] : '';

switch ($_GET["op"]) {
    case 'loaddata':
        $dato = array();
        $data = $rent->getDataUserById($user);
        $data2 = $rent->getDataCarById($option);
        foreach ($data as $data) {
            $dato['nameu']  = $data['nameu'];
            $dato['phone']  = $data['phone'];
            $dato['letter'] = $data['letter'];
            $dato['dni']    = $data['dni'];
            $dato['imgdni'] = $data['imgdni'];
            $dato['status'] = $data['status'];
        }
        foreach ($data2 as $data2) {
            $dato['brand']  = $data2['brand'];
            $dato['model']  = $data2['model'];
            $dato['anno']   = $data2['anno'];
            $dato['plate']  = $data2['plate'];
            $dato['cost']   = number_format($data2['cost'],2);
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;

    case 'register':
        $dato = array();
        if ($id ) {
            $data = $rent->updateRequest($id,$condition);
            if ($data) {
                $dato['status'] = true;
                $dato['messege'] = 'Se Actualizo Infomacion de Manera Exitosa';
            } else {
                $dato['status'] = false;
                $dato['messege'] = 'Error al Actualizar Infomacion';
            } 
        } else {
            $id = uniqid();
            $path1 = "../../img/payment/"; 
            $payment = $_FILES['payment']['name'];
            $moved = move_uploaded_file($_FILES['payment']['tmp_name'], $path1.'/'.$payment);
            if ($moved) {
                $data = $rent->DataRent($id,$user,$option,$fechar,$fechae,$dias,$mont,$payment,$condition,$now);
                if ($data) {
                    $dato['status'] = true;
                    $dato['messege'] = 'Se Actualizo Infomacion de Manera Exitosa (Usuario)';
                } else {
                    $dato['status'] = false;
                    $dato['messege'] = 'Error al Guardar Infomacion';
                }   
            }else {
                $dato['status'] = false;
                $dato['messege'] = 'Error al Cargar Imagen';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'request':
        $dato = array();
        $data = $rent->getRequest($user);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']   = $data['id'];
            $sub_array['brand']   = $data['brand'];
            $sub_array['model'] = $data['model'];
            $sub_array['anno'] = $data['anno'];
            $sub_array['daterent'] = $data['daterent'];
            $sub_array['mont']   = number_format($data['mont'],2);
            $sub_array['day']  = $data['day'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'requpd':
        
        $data = $rent->updateRequest($id,$condition);
        if ($data) {
            $dato['status'] = true;
            $dato['messege'] = 'Se Actualizo Infomacion de Manera Exitosa';
        } else {
            $dato['status'] = false;
            $dato['messege'] = 'Error al Actualizar Infomacion';
        }   
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'showreq':
        $dato = array();
        $data = $rent->getRequestId($id);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['daterent']  = $data['daterent'];
            $sub_array['nameu']  = $data['nameu'];
            $sub_array['letter'] = $data['letter'];
            $sub_array['dni']    = $data['dni'];
            $sub_array['phone']  = $data['phone'];
            $sub_array['email'] = $data['email'];
            $sub_array['address']    = $data['address'];
            $sub_array['brand']  = $data['brand'];
            $sub_array['model']  = $data['model'];
            $sub_array['anno'] = $data['anno'];
            $sub_array['plate']    = $data['plate'];
            $sub_array['cost']    = $data['cost'];
            $sub_array['datein']  = $data['datein'];
            $sub_array['dateout']  = $data['dateout'];
            $sub_array['mont'] = $data['mont'];
            $sub_array['day']    = $data['day'];
            $sub_array['payment']    = $data['payment'];
            $sub_array['status']    = $data['status'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'showallreq':
        $dato = array();
        $data = $rent->getRequestUser($user);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']  = $data['id'];
            $sub_array['nameu']  = $data['nameu'];
            $sub_array['phone']  = $data['phone'];
            $sub_array['letter'] = $data['letter'];
            $sub_array['dni']    = $data['dni'];
            $sub_array['brand']  = $data['brand'];
            $sub_array['model']  = $data['model'];
            $sub_array['anno'] = $data['anno'];
            $sub_array['plate']    = $data['plate'];
            $sub_array['cost']    = $data['cost'];
            $sub_array['datein']  = $data['datein'];
            $sub_array['dateout']  = $data['dateout'];
            $sub_array['daterent']  = $data['daterent'];
            $sub_array['mont'] = $data['mont'];
            $sub_array['day']    = $data['day'];
            $sub_array['payment']    = $data['payment'];
            $sub_array['status']    = $data['status'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        header("Location: ../../../");
        die();
        break;
}
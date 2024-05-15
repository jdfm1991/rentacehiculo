<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("../../../env.php");
require_once("user_model.php");

$client = new Client();

$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$option = (isset($_POST['option'])) ? $_POST['option'] : '';

$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$pdnil = (isset($_POST['pdnil'])) ? $_POST['pdnil'] : '';
$pdnin = (isset($_POST['pdnin'])) ? $_POST['pdnin'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$pass = (isset($_POST['passw'])) ? $_POST['passw'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$address = (isset($_POST['address'])) ? $_POST['address'] : '';


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
    
    case 'register':
        $dato = array();
        $path1 = "../../img/user/"; 
        $path2 = "../../img/identifications/"; 
        $imageu = $_FILES['imageu']['name'];
        if ($imageu) {
            $imguser = move_uploaded_file($_FILES['imageu']['tmp_name'], $path1.'/'.$imageu);
            if ($imguser) {
                if ($pass) {
                    $passw = password_hash($pass, PASSWORD_BCRYPT);
                    $data = $client->ImgUserUpdateAll($user,$email,$passw,$imageu);
                    if ($data) {
                        $dato['status1'] = true;
                        $dato['messege1'] = 'Se Actualizo Infomacion de Manera Exitosa (Usuario)';
                    } else {
                        $dato['status1'] = false;
                        $dato['messege1'] = 'Error al Actualizar Infomacion';
                    }
                } else {
                    $data = $client->ImgUserUpdate($user,$email,$imageu);
                    if ($data) {
                        $dato['status1'] = true;
                        $dato['messege1'] = 'Se Actualizo Infomacion de Manera Exitosa (Usuario)';
                    } else {
                        $dato['status1'] = false;
                        $dato['messege1'] = 'Error al Actualizar Infomacion';
                    }
                }
            } else {
                $dato['status1'] = false;
                $dato['messege1'] = 'Error al Actualizar Infomacion (Carga de Imagen)';
            } 
        } else {
            if ($passw) {
                $data = $client->UserUpdateAll($user,$email,$passw);
                if ($data) {
                    $dato['status1'] = true;
                    $dato['messege1'] = 'Se Actualizo Infomacion de Manera Exitosa (Usuario)';
                } else {
                    $dato['status1'] = false;
                    $dato['messege1'] = 'Error al Actualizar Infomacion';
                }
            } else {
                $data = $client->UserUpdate($user,$email);
                if ($data) {
                    $dato['status1'] = true;
                    $dato['messege1'] = 'Se Actualizo Infomacion de Manera Exitosa (Usuario)';
                } else {
                    $dato['status1'] = false;
                    $dato['messege1'] = 'Error al Actualizar Infomacion';
                }
            }
        }

        $idsupport = $_FILES['supportid']['name'];
        if ($idsupport) {
            $imgsupp = move_uploaded_file($_FILES['supportid']['tmp_name'], $path2.'/'.$idsupport);
            if ($imgsupp) {
                $data = $client->ImgUserDataUpdateAll($user,$name,$pdnil,$pdnin,$phone,$address,$idsupport);
                if ($data) {
                    $dato['status2'] = true;
                    $dato['messege2'] = 'Se Actualizo Infomacion de Manera Exitosa (Cliente)';
                } else {
                    $dato['status2'] = false;
                    $dato['messege2'] = 'Error al Actualizar Infomacion';
                }
            } else {
                $dato['status2'] = false;
                $dato['messege2'] = 'Error al Actualizar Infomacion (Carga de Imagen)';
            }  
        } else {
            $data = $client->UserDataUpdateAll($user,$name,$pdnil,$pdnin,$phone,$address);
            if ($data) {
                $dato['status2'] = true;
                $dato['messege2'] = 'Se Actualizo Infomacion de Manera Exitosa (Cliente)';
            } else {
                $dato['status2'] = false;
                $dato['messege2'] = 'Error al Actualizar Infomacion';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        # code...
        break;
}
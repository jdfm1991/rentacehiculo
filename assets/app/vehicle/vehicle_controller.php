<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("vehicle_model.php");

$vehicle = new Vehicle();


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
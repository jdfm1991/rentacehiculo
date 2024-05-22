<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("../../../env.php");
require_once("user_model.php");

$user = new User();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$active = (isset($_POST['active'])) ? $_POST['active'] : '';
$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$pdnil = (isset($_POST['pdnil'])) ? $_POST['pdnil'] : '';
$pdnin = (isset($_POST['pdnin'])) ? $_POST['pdnin'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$pass = (isset($_POST['passw'])) ? $_POST['passw'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$address = (isset($_POST['address'])) ? $_POST['address'] : '';


switch ($_GET["op"]) {
    case 'showall':
        $dato = array();
        $data = $user->getDataUserAll();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['user']   = $data['user'];
            $sub_array['nameu']   = $data['nameu'];
            $sub_array['address'] = $data['address'];
            $sub_array['phone']   = $data['phone'];
            $sub_array['status']  = $data['status'];
            $sub_array['email']   = $data['email'];
            $sub_array['type']   = $data['type'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'newactive':
        $dato = array();
        $data = $user->setNewStatusActive($id,$active);
        if ($data) {
            $dato['status']  = true;
            $dato['message'] = 'Se Elimino la Informacion de Manera Satisfactoria';
        } else {
            $dato['status']  = false;
            $dato['message'] = 'Error al Eliminar La Informacion';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'show':
        $dato = array();
        $data = $user->getDataUserByID($id);
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

    case 'newstatus':
        $dato = array();
        $data = $user->setNewStatus($id);
        if ($data) {
            $dato['status']  = true;
            $dato['message'] = 'Se Activo Usuario de Manera Satisfactoria';
        } else {
            $dato['status']  = false;
            $dato['message'] = 'Error al Activar Usuario';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'register':
        $dato = array();
        $path1 = "../../img/user/"; 
        $path2 = "../../img/identifications/";
        $imageu = ($_FILES) ? $_FILES['imageu']['name'] : '' ;   
        $supportid = ($_FILES) ? $_FILES['supportid']['name'] : '' ;     
        if ($id) {
            /***************************************************************/
            /**************Actualizando Informacion de Usuario**************/
            /***************************************************************/
            if ( $imageu) {
                $imguser = move_uploaded_file($_FILES['imageu']['tmp_name'], $path1.'/'.$imageu);
                if ($pass) {
                    $passw = password_hash($pass, PASSWORD_BCRYPT);
                    $data = $user->ImgUserUpdateAll($id,$email,$passw,$imageu);
                    if ($data) {
                        $dato['status1'] = true;
                        $dato['messege1'] = 'Se Actualizo Infomacion de Usuario de Manera Exitosa';
                    } else {
                        $dato['status1'] = false;
                        $dato['messege1'] = 'Error al Actualizar Infomacion de Usuario';
                    }
                } else {
                    $data = $user->ImgUserUpdate($id,$email,$imageu);
                    if ($data) {
                        $dato['status1'] = true;
                        $dato['messege1'] = 'Se Actualizo Infomacion de Usuario de Manera Exitosa';
                    } else {
                        $dato['status1'] = false;
                        $dato['messege1'] = 'Error al Actualizar Infomacion de Usuario';
                    }
                }
            }else {
                if ($pass) {
                    $passw = password_hash($pass, PASSWORD_BCRYPT);
                    $data = $user->UserUpdateAll($id,$email,$passw);
                    if ($data) {
                        $dato['statusu'] = true;
                        $dato['messegeu'] = 'Se Actualizo Infomacion de Usuario de Manera Exitosa';
                    } else {
                        $dato['statusu'] = false;
                        $dato['messegeu'] = 'Error al Actualizar Infomacion de Usuario';
                    }
                } else {
                    $data = $user->UserUpdate($id,$email);
                    if ($data) {
                        $dato['statusu'] = true;
                        $dato['messegeu'] = 'Se Actualizo Infomacion de Usuario de Manera Exitosa';
                    } else {
                        $dato['statusu'] = false;
                        $dato['messegeu'] = 'Error al Actualizar Infomacion de Usuario';
                    }
                }
            }
            /***************************************************************/
            /**************Actualizando Informacion de Cliente**************/
            /***************************************************************/
            
            if ($supportid) {
                $imgsupp = move_uploaded_file($_FILES['supportid']['tmp_name'], $path2.'/'.$supportid);
                $data = $user->ImgUserDataUpdateAll($id,$name,$pdnil,$pdnin,$phone,$address,$idsupport);
                if ($data) {
                    $dato['statusc'] = true;
                    $dato['messegec'] = 'Se Actualizo Infomacion del Cliente de Manera Exitosa';
                } else {
                    $dato['statusc'] = false;
                    $dato['messegec'] = 'Error al Actualizar Infomacion del Cliente';
                } 
            } else {
                $data = $user->UserDataUpdateAll($id,$name,$pdnil,$pdnin,$phone,$address);
                if ($data) {
                    $dato['statusc'] = true;
                    $dato['messegec'] = 'Se Actualizo Infomacion del Cliente de Manera Exitosa';
                } else {
                    $dato['statusc'] = false;
                    $dato['messegec'] = 'Error al Actualizar Infomacion del Cliente';
                }
            }
        } else {
            $dato['status'] = false;
            $dato['messege'] = 'No Se Envio Ningun ID de Usuario';
        }
        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        header("Location: ../../../");
        die();
        break;
}
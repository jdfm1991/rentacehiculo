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
        
    case 'register':
        $id = uniqid();
        $passenc = password_hash($passw, PASSWORD_BCRYPT);
        $type= 2;
        $dato = array();
        $userDB = $user->getLoginUser($email);
        if ($userDB) {
            $dato['status']  = false;
            $dato['message'] = 'Ya se Encuentra un Usuario Registrado con ese Correo, Por Favor Verifique Informacion o Seleccione la Opcion de Olvide Contraseña';
        } else {
            $logreg = $user->setDataLogin($id,$email,$passenc,$type);
            if ($logreg) {
                $setdata = $user->setDataUser($id,$name,$phone);
                if ($setdata) {
                    $data = $user->getLoginUser($email);
                    if (is_array($data) AND count($data) > 0) {
                        foreach ($data as $data) {
                            if (password_verify($passw, $data['passw'])) {
                                $_SESSION['email'] = $data['email'];
                                $_SESSION['passw'] = $data['passw'];
                                $dato['status']  = true;
                                $dato['message'] = 'Ingreso de Manera Exitosa, Sea Bienvenido!';
                                $dato['ut'] = $data['type'];
                            }else {
                                $dato['status']  = false;
                                $dato['message'] = 'La Contraseña es incorrecto';
                            }
                        }
                    }else {
                        $dato['status']  = false;
                        $dato['message'] = 'El Usuario es incorrecto';
                    }
                }else {
                    $dato['status']  = false;
                    $dato['message'] = 'Error al Registrar Informacion de Nuevo Usuario!';
                }
            }else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Registrar Nuevo Usuario!';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;

    default:
        # code...
        break;
}
<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("../../../env.php");
require_once("home_model.php");

$home = new Home();

$id = (isset($_POST['id'])) ? $_POST['id'] : '664dd5260e7e7';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$passw = (isset($_POST['passw'])) ? $_POST['passw'] : '';

switch ($_GET["op"]) {
    case 'login':
        $dato = array();
        $data = $home->getLoginUser($email);
        if (is_array($data) AND count($data) > 0) {
                foreach ($data as $data) {
                    if (password_verify($passw, $data['passw'])) {
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['passw'] = $data['passw'];
                        $_SESSION['idtype'] = $data['idtype'];
                        $dato['status']  = true;
                        $dato['message'] = 'Ingreso de Manera Exitosa, Sea Bienvenido!';
                        $dato['idtype'] = $data['idtype'];
                        $dato['type'] = $data['type'];
                    }else {
                        $dato['status']  = false;
                        $dato['message'] = 'La Contraseña es incorrecto';
                    }
                }
        }else {
            $dato['status']  = false;
            $dato['message'] = 'El Usuario es incorrecto';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;
        
    case 'register':
        $id = uniqid();
        $passenc = password_hash($passw, PASSWORD_BCRYPT);
        $type= 2;
        $dato = array();
        $userDB = $home->getLoginUser($email);
        if ($userDB) {
            $dato['status']  = false;
            $dato['message'] = 'Ya se Encuentra un Usuario Registrado con ese Correo, Por Favor Verifique Informacion o Seleccione la Opcion de Olvide Contraseña';
        } else {
            $logreg = $home->setDataLogin($id,$email,$passenc,$type);
            if ($logreg) {
                $setdata = $home->setDataUser($id,$name,$phone);
                if ($setdata) {
                    $data = $home->getLoginUser($email);
                    if (is_array($data) AND count($data) > 0) {
                        foreach ($data as $data) {
                            if (password_verify($passw, $data['passw'])) {
                                $_SESSION['id'] = $data['id'];
                                $_SESSION['email'] = $data['email'];
                                $_SESSION['passw'] = $data['passw'];
                                $_SESSION['idtype'] = $data['idtype'];
                                $dato['status']  = true;
                                $dato['message'] = 'Ingreso de Manera Exitosa, Sea Bienvenido!';
                                $dato['idtype'] = $data['idtype'];
                                $dato['type'] = $data['type'];
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

    case 'Valideteinfo':
        $dato = array();
        $data = $home->getDataInitialInfo($id);
        if ($data>0) {
            $dato['status']  = true;
            $dato['message'] = 'Este Usuario No Posee La Infomacion de Perfil Completa, Desea Completarla Ahora?';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    default:
        # code...
        break;
}
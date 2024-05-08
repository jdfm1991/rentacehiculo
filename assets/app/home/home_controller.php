<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("home_model.php");

$user = new User();

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$passw = (isset($_POST['passw'])) ? $_POST['passw'] : '';

switch ($_GET["op"]) {
    case 'login':
        $data = $user->getLoginUser($email,$passw);
        if (is_array($data) AND count($data) > 0) {
            $dato = array();
            foreach ($data as $data) {
                $_SESSION['email'] = $data['email'];
                $_SESSION['passw'] = $data['passw'];
            }
            $dato['status']  = true;
            $dato['message'] = 'Ingreso de Manera Exitosa, Sea Bienvenido!';
            $dato['ut'] = $data['type'];
        }else {
            $dato = array();
            $dato['status']  = false;
            $dato['message'] = 'El Usuario y/o password es incorrecto!';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;
    default:
        # code...
        break;
}
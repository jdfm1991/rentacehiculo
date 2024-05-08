<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("../../../env.php");
require_once("../../vendor/PHPMailer/class.phpmailer.php");
require_once("../../vendor/PHPMailer/class.smtp.php");
require_once("home_model.php");

$user = new User();

$name = (isset($_POST['name'])) ? $_POST['name'] : 'Jovanni Franco';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '04249265304';
$email = (isset($_POST['email'])) ? $_POST['email'] : 'jovannifranco@gmail.com';
$passw = (isset($_POST['passw'])) ? $_POST['passw'] : '20975144';

switch ($_GET["op"]) {
    case 'login':
        $dato = array();
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

    case 'forget':
        $dato = array();
        $massege = "";
        $forget = $user->getforgetUser($email);
        foreach ($forget as $data) {
            $nname  = $data['nameu'];
            $nemail = $data['email'];
            $nphone = $data['phone'];
        }
        if ($forget) {
           $massege='
           <!doctype html>
           <html lang="en">
            <head>
                <title>Recuperacion de Contrase#a</title>
                <!-- Required meta tags -->
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                <!-- Bootstrap CSS v5.2.1 -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
            </head>
           
            <body>
                <header>
                    <h1 class="text-center">Solicitud de Recuperacion de Contrase#a</h1>
                </header>
                <main>
                    <div class="card">
                        <img class="card-img-top" src="https://img.freepik.com/vector-gratis/vector-degradado-logotipo-colorido-pajaro_343694-1365.jpg?size=338&ext=jpg&ga=GA1.1.1687694167.1715126400&semt=ais_user" width="100px" alt="Title" />
                        <div class="card-body">
                            <h4 class="card-title">Datos de Solucitud</h4>
                            <p class="card-text">Cliente: '.$nname.'</p>
                            <p class="card-text">Correo: '.$nemail.'</p>
                            <p class="card-text">Telefono: '.$nphone.'</p>
                        </div>
                    </div>
                    
                </main>
                <footer>
                    <!-- place footer here -->
                </footer>
                <!-- Bootstrap JavaScript Libraries -->
                <script
                    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                    crossorigin="anonymous"
                ></script>
           
                <script
                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                    crossorigin="anonymous"
                ></script>
            </body>
           </html>
           ';

            $mail = new PHPMailer(true);
            
            //Server settings
            $mail->isSMTP();                // Enviar con SMTP
            $mail->Host = 'smtp.gmail.com';      // Servidor SMTP
            $mail->SMTPAuth = true; 
            
            $mail->Username = EMAIL;
            $mail->Password = PASSWORD_EMAIL;

            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->From=EMAIL;
            $mail->addAddress("jdfm1991@gmail.com");     // Añadir destinatario

            // Contenido
            $mail->isHTML(true);                                  	// Enviar en HTML
            $mail->Subject = "Solicitud de Reinicio de Clave";
            $mail->Body    = $massege;
            $send = $mail->Send();
            echo "aqui".$send;
            if ($mail->Send()) {
                $dato['status']  = true;
                $dato['message'] = 'Solicitud de Recuperacion Enviada!';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error en Envio de Solicitud!';
            }

            




            
        } else {
            $dato['status']  = false;
            $dato['message'] = 'No Se Encontro Usuario Registrado con Este Correo!';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    default:
        # code...
        break;
}
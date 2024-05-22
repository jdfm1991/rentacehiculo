<?php
session_name('R3nt@k4r');
session_start();
date_default_timezone_set('America/Caracas');

require_once("../../../conection.php");
require_once("../../../env.php");
require_once("../../mpdf/autoload.php");
require_once("../../phpqrcode/qrlib.php");
require_once("user_model.php");

$user = new User();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$data = $user->getDataUserByID($id);

foreach ($data as $data) {
    $daterent = $data['daterent'];
    $nameu = $data['nameu'];
    $letter= $data['letter'];
    $dni   = $data['dni'];
    $phone = $data['phone'];
    $email= $data['email'];
    $address   = $data['address'];
    $status = ($data['status']==1) ? 'Cliente Aprobado' : 'Cliente Aun No Aprobado' ;
}

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'orientation' => 'P',
    'setAutoTopMargin' => 'stretch',
    'setAutoBottomMargin' => 'stretch',
]);

$codesDir = "../../img/qr/";   
$codeFile = $id.'.png';
QRcode::png('http://localhost/rentvehiculo/assets/app/rent/pdf.php?id='.$id, $codesDir.$codeFile,'H',4); 

$stylesheet = file_get_contents('../../css/pdf.css');
$body = '
        <h2 class="title">Comprobante</h2>
        <h2 class="title">Datos de Cliente</h2>
        <p class="text"><span>Nombre y Apellido <strong>'.$nameu.'</strong>, D.N.I. ("Numero Cedula o Pasaporte") <strong>'.$letter.'-'.$dni.'</strong>, Numero Telefonico  <strong>'.$phone.'</strong>, Correo <strong>'.$email.'</strong>, Direccion <strong>'.$address.'</strong></span></p>
        <div class="dateinfo"><img src="'.$codesDir.$codeFile.'" /><p >ID de Solicitud</p></div>';


$mpdf->SetHeader('<img src="../../img/logo.png" style="width: 100px;">|<h1>Nombre de la Empresa</h1>Pag.: {PAGENO}, Consulta del: {DATE j-m-Y}');
$mpdf->SetFooter('&copy; Copyright <strong><span>Informacion de empresa</span></strong>. All Rights Reserved <strong>, Diseño por </strong><b> @CM & SM Systems <strong><span></span></strong>, C.A. </b>|Numero de Pagina: {PAGENO}| Fecha de Consulta: {DATE j-m-Y}');
$mpdf->defaultheaderfontsize=10;
$mpdf->defaultheaderfontstyle='B';
$mpdf->defaultheaderline=0;
$mpdf->defaultfooterfontsize=10;
$mpdf->defaultfooterfontstyle='BI';
$mpdf->defaultfooterline=0;

$mpdf->SetWatermarkImage('../../img/logo.png');
$mpdf->showWatermarkImage = true;
$mpdf->watermarkImageAlpha = 0.1;

$mpdf->SetWatermarkText($status);
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output($id.'.pdf',\Mpdf\Output\Destination::INLINE);

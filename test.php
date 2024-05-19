<?php
require_once("assets/mpdf/autoload.php");

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'orientation' => 'P',
    'setAutoTopMargin' => 'stretch',
    'setAutoBottomMargin' => 'stretch',
]);


$stylesheet = file_get_contents('assets/css/pdf.css');

        $body = '
        <div class="dateinfo"><label><span><strong>Fecha de Solicitud: </strong></span></label><strong>Numero$daterentNumero</strong></div>
        <h2 class="title">Comprobante de Solicitud</h2>
        <h2 class="title">Datos de Cliente</h2>
        <p><span>Nombre y Apellido <strong>Numero$nameuNumero</strong>, D.N.I. ("Numero Cedula o Pasaporte") <strong>Numero$letterNumero-Numero$dniNumero</strong>, Numero Telefonico  <strong>Numero$phoneNumero</strong>, Correo <strong>Numero$emailNumero</strong>, Direccion <strong>Numero$addressNumero</strong></span></p>
        <h2 class="title">Datos de Vehiculo</h2>
        <p><span>Marca del Vehiculo <strong>Numero$brandNumero</strong>, Modelo del Vehiculo <strong>Numero$modelNumero</strong>, Año <strong>Numero$annoNumero</strong>, Numero Matricula <strong>Numero$plateNumero</strong></span></p>
        <h2 class="title">Datos de Alquiler</h2>
        <p><span>Dias de Alquiler de Vehiculo <strong>Numero$dayNumero</strong>, Monto Pagado <strong>Numero$montNumero</strong>, Fecha en la que  Cliente Recibe el Vehiculo <strong>Numero$dateinNumero</strong>, Fecha en que el Cliente debe entregar el Vehiculo <strong>Numero$dateoutNumero</strong></span></p>
        <h2 class="title">Datos de Pago</h2>
        <p><span>Forma de pago <strong>Pendiente Por definir</strong>, Numero de Operacion <strong>***ejm124578***</strong>, Fecha de Pago <strong>**14/15/15**</strong></span></p>
        <div class="dateinfo"><label><span><strong>ID de Solicitud: </strong></span></label><strong>Numero$idNumero</strong></div>';


$mpdf->SetHeader('<img src="assets/img/logo.png" style="width: 100px;">|<h1>Nombre de la Empresa</h1>Pag.: {PAGENO}, Consulta del: {DATE j-m-Y}');
$mpdf->SetFooter('&copy; Copyright <strong><span>Informacion de empresa</span></strong>. All Rights Reserved <strong>, Diseño por </strong><b> @CM & SM Systems <strong><span></span></strong>, C.A. </b>|Numero de Pagina: {PAGENO}| Fecha de Consulta: {DATE j-m-Y}');
$mpdf->defaultheaderfontsize=10;
$mpdf->defaultheaderfontstyle='B';
$mpdf->defaultheaderline=0;
$mpdf->defaultfooterfontsize=10;
$mpdf->defaultfooterfontstyle='BI';
$mpdf->defaultfooterline=0;

$mpdf->SetWatermarkImage('assets/img/logo.png');
$mpdf->showWatermarkImage = true;
$mpdf->watermarkImageAlpha = 0.1;

$mpdf->SetWatermarkText('Nombre de la Empresa');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output('tesrt.pdf','F');
	






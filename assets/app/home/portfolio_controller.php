<?php
//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO 
require_once("owner_model.php");

//INSTANCIAMOS EL MODELO
$owner = new Owner();

$ownerid    = (isset($_POST['ownerid'])) ? $_POST['ownerid'] : '';
$nameowner  = (isset($_POST['nameowner'])) ? $_POST['nameowner'] : '';
$phoneowner = (isset($_POST['phoneowner'])) ? $_POST['phoneowner'] : '';
$igowner    = (isset($_POST['igowner'])) ? $_POST['igowner'] : '';
$ligowner   = (isset($_POST['ligowner'])) ? $_POST['ligowner'] : '';
//$pimageown  = (isset($_POST['pimageown'])) ? $_POST['pimageown'] : '';


switch($_GET["op"]){

    case 'list':

        $data = $owner->getdata();

        $dato = Array();

        
        foreach ($data as $row) {
            $sub_array = array();
            
            $sub_array['id']        = $row['id'];
            $sub_array['own']       = $row['own'];
            $sub_array['phone']     = $row['phone'];
            $sub_array['igsocial']  = $row['igsocial'];
            $sub_array['ligsocial'] = $row['ligsocial'];
            $sub_array['Oimage']    = $row['Oimage'];


            $dato[] = $sub_array;
            
        }
        
       
        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 

        break;

    case 'save_edit':

        $destino = "../../assets/img/owner/"; 
        //Parámetros optimización, resolución máxima permitida
        $max_ancho = 300;
        $max_alto  = 300;

        $medidasimagen= getimagesize($_FILES['pimageown']['tmp_name']);

        //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
        if($medidasimagen[0] < 500 && $_FILES['pimageown']['size'] < 10000){
         
            $nombre_img = $_FILES['pimageown']['name'];
            move_uploaded_file($_FILES['pimageown']['tmp_name'], $destino.'/'.$nombre_img);
                
        } 
        //Si no, se generan nuevas imagenes optimizadas
        else {
            $nombre_img = $_FILES['pimageown']['name'];
    
            //Redimensionar
            $rtOriginal=$_FILES['pimageown']['tmp_name'];
    
            if($_FILES['pimageown']['type']=='image/jpeg'){
                $original = imagecreatefromjpeg($rtOriginal);
            }else if($_FILES['pimageown']['type']=='image/png'){
                $original = imagecreatefrompng($rtOriginal);
            }else if($_FILES['pimageown']['type']=='image/gif'){
                $original = imagecreatefromgif($rtOriginal);
            }
    
            list($ancho,$alto)=getimagesize($rtOriginal);
    
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;
    
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                $ancho_final = $ancho;
                $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            }
            else{
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }
    
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
    
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            
            //imagedestroy($original);
            
            $cal=8;
    
            if($_FILES['pimageown']['type']=='image/jpeg'){
                imagejpeg($lienzo,$destino."/".$nombre_img);
            }else if($_FILES['pimageown']['type']=='image/png'){
                imagepng($lienzo,$destino."/".$nombre_img);
            }
            else if($_FILES['pimageown']['type']=='image/gif'){
            imagegif($lienzo,$destino."/".$nombre_img);
            }
    
        }

        $count = $owner->countdata($ownerid);
        $data = Array();

        if ($count == 0) {
            $new = $owner->savedata($nameowner,$phoneowner,$igowner,$ligowner,$nombre_img);
            
                $sub_array = array();
                $sub_array['status'] =  'new';
                $sub_array['name'] =  $nameowner;
           
            
            $dato[] = $sub_array;
        } else {
            if(empty($_FILES['pimageown'])){
                $update = $owner->updatedata($ownerid,$nameowner,$phoneowner,$igowner,$ligowner);
            }else {
                $update = $owner->updatedata1($ownerid,$nameowner,$phoneowner,$igowner,$ligowner,$nombre_img);
            }
            
           
                $sub_array = array();
                $sub_array['status'] =  'update';
                $sub_array['servic'] =  $cmservname;
                $dato[] = $sub_array;
            }           
            
        

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);

        break;

    case 'delete':

        $delete = $owner->deletedata($ownerid);
        if ($delete) {
            $data = array();
           
            $data['status']  = true;
            $data['message'] = '¡Se elimino usuario Exitosamente!';
            
        }else {
            $data = array();
           
            $data['status']  = false;
            $data['message'] = '¡Error eliminar usuario!';
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);                         
        break;
}













?>
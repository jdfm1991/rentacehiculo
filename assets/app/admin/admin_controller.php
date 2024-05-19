<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("admin_model.php");

$admin = new Admin();



switch($_GET["op"]){

    case 'initcount':
        $dato   = array();
        $data   = $admin->getDataCountInit();
        foreach ($data as $data) {
            $dato['Nclient'] = $data['Nclient'];
            $dato['Nuser']  = $data['Nuser'];
            $dato['Ncar']    = $data['Ncar'];
            $dato['Nrent']   = $data['Nrent'];
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'processbar':
        $dato   = array();
        $data   = $admin->getDataStatus();
        $total   = $admin->getDataRent();
        foreach ($data as $data) {
            $sub_array = array();
            $id = $data['id'];
            $count   = $admin->getDataRentById($id);
            $sub_array['status'] = $data['status'];
            $sub_array['count'] = $count;
            $sub_array['percent'] = number_format((($count/$total)*100),2);
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
}
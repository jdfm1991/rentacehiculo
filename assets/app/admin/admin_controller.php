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
    
    case 'processreq':
        $dato   = array();
        $data   = $admin->getDataRequestStatus();
        $total   = $admin->getDataRent();
        foreach ($data as $data) {
            $sub_array = array();
            $id = $data['id'];
            $count   = $admin->getDataRentByStatus($id);
            $sub_array['status'] = $data['status'];
            $sub_array['count'] = $count;
            $sub_array['percent'] = number_format((($count/$total)*100),2);
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    case 'processcar':
        $dato   = array();
        $data   = $admin->getDataCarStatus();
        $total   = $admin->getDatacar();
        foreach ($data as $data) {
            $sub_array = array();
            $id = $data['id'];
            $count   = $admin->getDatacarByStatus($id);
            $sub_array['status'] = $data['status'];
            $sub_array['count'] = $count;
            $sub_array['percent'] = number_format((($count/$total)*100),2);
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'processuser':
        $dato   = array();
        $data   = $admin->getDataClient();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['clientactive'] = $data['clientactive'];
            $sub_array['clientinactive'] = $data['clientinactive'];
            $sub_array['totalclient'] = $data['totalclient'];
            $sub_array['percentactive'] = number_format((($data['clientactive']/$data['totalclient'])*100),2);
            $sub_array['percentinactive'] = number_format((($data['clientinactive']/$data['totalclient'])*100),2);
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    case 'showstatus':
        $data   = $admin->getDataRequestStatusAdmin();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id'] = $data['id'];
            $sub_array['status'] = $data['status'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
}


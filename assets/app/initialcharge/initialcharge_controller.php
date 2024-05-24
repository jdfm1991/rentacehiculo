<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("initialcharge_model.php");

$ic = new InitialCharge();

$id  = (isset($_POST['id'])) ? $_POST['id'] : '2';
$region  = (isset($_POST['region'])) ? $_POST['region'] : '';
$brand  = (isset($_POST['brand'])) ? $_POST['brand'] : '';
$model  = (isset($_POST['model'])) ? $_POST['model'] : '';
$active  = (isset($_POST['active'])) ? $_POST['active'] : '';

switch ($_GET["op"]) {
    case 'region':
        $dato = array();
        $data = $ic->getDataRegion();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']     = $data['id'];
            $sub_array['region'] = $data['region'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'brand':
        $dato = array();
        $data = $ic->getDataBrand();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['brand'] = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'model':
        $dato = array();
        $condition = ($brand) ? ' AND A.brand='.$brand : '' ;
        $data = $ic->getDataModel($condition);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['model'] = $data['model'];
            $sub_array['brand'] = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'createregion':
        $dato = array();
        if ($id) {
            $data = $ic->updateDataRegion($id,$region);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Actualizo la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Actualizar La Informacion';
            }
        } else {
            $id = uniqid();
            $data = $ic->setDataRegion($id,$region);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Registro la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Registrar La Informacion';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'searchregion':
        $dato = array();
        $data = $ic->getDataRegionById($id);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['region']   = $data['region'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'removeregion':
        $dato = array();
        $data = $ic->removeStatusRegion($id,$active);
        if ($data) {
            $dato['status']  = true;
            $dato['message'] = 'Se Elimino la Informacion de Manera Satisfactoria';
        } else {
            $dato['status']  = false;
            $dato['message'] = 'Error al Eliminar La Informacion';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'createbrand':
        $dato = array();
        if ($id) {
            $data = $ic->updateDataBrand($id,$brand);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Actualizo la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Actualizar La Informacion';
            }
        } else {
            $id = uniqid();
            $data = $ic->setDataBrand($id,$brand);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Registro la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Registrar La Informacion';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'searchbrand':
        $dato = array();
        $data = $ic->getDataBrandById($id);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['brand']   = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'removebrand':
        $dato = array();
        $data = $ic->removeStatusBrand($id,$active);
        if ($data) {
            $dato['status']  = true;
            $dato['message'] = 'Se Elimino la Informacion de Manera Satisfactoria';
        } else {
            $dato['status']  = false;
            $dato['message'] = 'Error al Eliminar La Informacion';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'createmodel':
        $dato = array();
        if ($id) {
            $data = $ic->updateDataModel($id,$model,$brand);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Actualizo la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Actualizar La Informacion';
            }
        } else {
            $id = uniqid();
            $data = $ic->setDataModel($id,$model,$brand);
            if ($data) {
                $dato['status']  = true;
                $dato['message'] = 'Se Registro la Informacion de Manera Satisfactoria';
            } else {
                $dato['status']  = false;
                $dato['message'] = 'Error al Registrar La Informacion';
            }
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'searchmodel':
        $dato = array();
        $data = $ic->getDataModelById($id);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['model']   = $data['model'];
            $sub_array['brand']   = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'removemodel':
        $dato = array();
        $data = $ic->removeStatusModel($id,$active);
        if ($data) {
            $dato['status']  = true;
            $dato['message'] = 'Se Elimino la Informacion de Manera Satisfactoria';
        } else {
            $dato['status']  = false;
            $dato['message'] = 'Error al Eliminar La Informacion';
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
        
    default:
        header("Location: ../../../");
        die();
        break;
}
<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("portfolio_model.php");

$portfolio = new Portfolio();

$index   = (isset($_POST['index'])) ? $_POST['index'] : '1';
$id   = (isset($_POST['id'])) ? $_POST['id'] : '1';
$model = (isset($_POST['model'])) ? $_POST['model'] : '';
$brand = (isset($_POST['brand'])) ? $_POST['brand'] : '';
$anno = (isset($_POST['anno'])) ? $_POST['anno'] : '';
$region = (isset($_POST['region'])) ? $_POST['region'] : '';

switch($_GET["op"]){

    case 'show':
        $finish =  12;
        $begin = ($index - 1) * $finish;
        $dato = array();
        $data = $portfolio->getDataPortfolio($begin,$finish);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $image = $portfolio->getDataImgPortfolio($data['id']);
            $sub_array['imgc']    = $image;
            $sub_array['model'] = $data['model'];
            $sub_array['brand']    = $data['brand'];
            $sub_array['anno'] = $data['anno'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'showdetails':

        $dato = array();
        $data = $portfolio->getDataDetailsPortfolio($id);
        $data2 = $portfolio->getDataImgDetailsPortfolio($id);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['model'] = $data['model'];
            $sub_array['brand']    = $data['brand'];
            $sub_array['anno'] = $data['anno'];
            $sub_array['descrip'] = $data['descrip'];
            $image = array();
            foreach ($data2 as $data2) {
                array_push($image, $data2['image']);
                $sub_array['image'] = $image;
            }
            $dato[] = $sub_array;
        }
        
        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'pages':
        $finish =  12;
        $data = $portfolio->getDataPortfolios();
        $count = count($data);
        $dato = ceil($count/$finish);
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'model':
        $dato = array();
        $data = $portfolio->getDataModel($add_query);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['model'] = $data['model'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'brand':
        $dato = array();
        $data = $portfolio->getDataBrand();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['brand'] = $data['brand'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'anno':
        $dato = array();
        $data = $portfolio->getDataAnno();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['anno'] = $data['anno'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'region':
        $dato = array();
        $data = $portfolio->getDataRegion();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $sub_array['region'] = $data['region'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    
}













?>
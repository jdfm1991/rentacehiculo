<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("portfolio_model.php");

$portfolio = new Portfolio();

$index   = (isset($_POST['index'])) ? $_POST['index'] : '';
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
            $sub_array['imgc']    = $data['imgc'];
            $sub_array['model'] = $data['model'];
            $sub_array['brand']    = $data['brand'];
            $sub_array['anno'] = $data['anno'];
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
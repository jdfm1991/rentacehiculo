<?php
session_name('R3nt@k4r');
session_start();
require_once("../../../conection.php");
require_once("portfolio_model.php");

$portfolio = new Portfolio();

$index  = (isset($_POST['index'])) ? $_POST['index'] : '';
$id     = (isset($_POST['id'])) ? $_POST['id'] : '664d42468a036';
$region = (isset($_POST['region'])) ? $_POST['region'] : '';
$model  = (isset($_POST['model'])) ? $_POST['model'] : '';
$anno   = (isset($_POST['anno'])) ? $_POST['anno'] : '';


switch($_GET["op"]){

    case 'show':
        $finish =  12;
        $begin  = ($index - 1) * $finish;
        $dato   = array();
        $data   = $portfolio->getDataPortfolio($begin,$finish);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $image = $portfolio->getDataImgPortfolio($data['id']);
            $sub_array['imgc']  = $image;
            $sub_array['model'] = $data['model'];
            $sub_array['brand'] = $data['brand'];
            $sub_array['anno']  = $data['anno'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'showall':
        $dato = array();
        $data = $portfolio->getDataPortfolioAll();
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $image = $portfolio->getDataImgPortfolio($data['id']);
            $sub_array['imgc']  = $image;
            $sub_array['model'] = $data['model'];
            $sub_array['brand'] = $data['brand'];
            $sub_array['anno']  = $data['anno'];
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
            $sub_array['id']        = $data['id'];
            $sub_array['model']     = $data['model'];
            $sub_array['brand']     = $data['brand'];
            $sub_array['anno']      = $data['anno'];
            $sub_array['descrip']   = $data['description'];
            $sub_array['status']    = $data['status'];
            $image = array();
            foreach ($data2 as $data2) {
                array_push($image, $data2['imgcar']);
                $sub_array['image'] = $image;
            }
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'advanced':
        $condition = '';
        $condition .= (!empty($region)) ? ' WHERE A.region ='.$region : '' ;
        $condition .= (!empty($region) && !empty($brand)) ? ' AND A.brand ='.$brand : '' ;
        $condition .= (!empty($region) && !empty($brand) && !empty($model)) ? ' AND A.model ='.$model : '' ;
        $condition .= (!empty($region) && !empty($brand) && !empty($model) && !empty($anno)) ? ' AND A.anno ='.$anno : '' ;
        $dato = array();
        $data = $portfolio->getDataPortfolioAdvanced($condition);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['id']    = $data['id'];
            $image = $portfolio->getDataImgPortfolio($data['id']);
            $sub_array['imgc']   = $image;
            $sub_array['region'] = $data['region'];
            $sub_array['brand']  = $data['brand'];
            $sub_array['model']  = $data['model'];
            $sub_array['anno']   = $data['anno'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'pages':
        $finish =  12;
        $data   = $portfolio->getDataPortfolios();
        $count  = count($data);
        $dato   = ceil($count/$finish);
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'brand':
        $dato = array();
        $data = $portfolio->getDataBrand($region);
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
        $data = $portfolio->getDataAnno($region,$brand,$model);
        foreach ($data as $data) {
            $sub_array = array();
            $sub_array['anno'] = $data['anno'];
            $dato[] = $sub_array;
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

   
}













?>
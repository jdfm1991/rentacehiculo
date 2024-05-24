<?php
require_once("../../../conection.php");

class Portfolio extends Conectar{

    public function getDataPortfolio($begin,$finish){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT  A.id,anno,B.model AS model, C.brand AS brand FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            WHERE A.active=1
            ORDER BY A.id ASC
            LIMIT $begin,$finish";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataPortfolioAll(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT  A.id,anno,B.model AS model, C.brand AS brand FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            WHERE A.active=1
            ORDER BY A.id ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataImgPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT imgcar FROM cars_images_table WHERE car=? AND top=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['imgcar']);
    }

    public function getDataDetailsPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT A.id,anno,B.model, C.brand, A.description, A.status FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            WHERE A.id=? AND A.active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataImgDetailsPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT imgcar FROM cars_images_table WHERE car = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataPortfolioAdvanced($condition){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT  A.id,anno,E.region AS region,B.model AS model, C.brand AS brand FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            INNER JOIN cars_regions_table AS E ON A.region=E.id $condition
            ORDER BY A.id ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDataPortfolios(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataBrand($region){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT B.id  AS id , B.brand AS brand, A.region FROM cars_table AS A 
            INNER JOIN cars_brands_table AS B ON A.brand=B.id
            WHERE region=?
            ORDER BY B.brand ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $region);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataAnno($region,$brand,$model){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT anno FROM `cars_table` WHERE region=? AND brand=? AND model=? ORDER BY anno DESC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $region);
        $sql->bindValue(2, $brand);
        $sql->bindValue(3, $model);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}


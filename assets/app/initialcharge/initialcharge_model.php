<?php
require_once("../../../conection.php");

class InitialCharge extends Conectar{

    public function getDataRegion(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_regions_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataBrand(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_brands_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataModel($brand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT B.id AS id, B.model AS model FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            WHERE A.brand=?
            ORDER BY B.brand ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $brand);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

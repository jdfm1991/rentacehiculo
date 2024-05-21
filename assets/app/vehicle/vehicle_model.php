<?php
require_once("../../../conection.php");

class Vehicle extends Conectar{

    public function getDataVehicleAll(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT A.id, plate, C.region, D.brand, E.model, anno, cost, description, A.status AS ids, B.status FROM cars_table AS A 
            INNER JOIN cars_status_table AS B ON A.status=B.id
            INNER JOIN cars_regions_table AS C ON A.region=C.id
            INNER JOIN cars_brands_table AS D ON A.brand=D.id
            INNER JOIN cars_models_table AS E ON A.model=e.id";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataVehicleStatus(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_status_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


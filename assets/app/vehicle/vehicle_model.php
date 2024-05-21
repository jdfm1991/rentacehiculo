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

    public function getDataVehicleByPlate($plate){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT COUNT(*) AS N FROM cars_table WHERE plate=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $plate);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['N']);
    }

    public function setDataVehicleImage($id,$filename){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $data=NULL;
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO cars_images_table (id, car, imgcar) VALUES (?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $data);
		$sql->bindValue(2, $id);
        $sql->bindValue(3, $filename);
		return $sql->execute();
	}

    public function setDataVehicle($id,$plate,$region,$brand,$model,$anno,$cost,$status,$descrip){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO cars_table(id, region, brand, model, anno, plate, cost, description, status) VALUES (?,?,?,?,?,?,?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
		$sql->bindValue(2, $region);
        $sql->bindValue(3, $brand);
        $sql->bindValue(4, $model);
		$sql->bindValue(5, $anno);
        $sql->bindValue(6, $plate);
        $sql->bindValue(7, $cost);
		$sql->bindValue(8, $descrip);
		$sql->bindValue(9, $status);
		return $sql->execute();
	}
}


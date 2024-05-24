<?php
require_once("../../../conection.php");

class InitialCharge extends Conectar{

    public function getDataRegion(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_regions_table WHERE active=1";
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
            $sql="SELECT * FROM cars_brands_table WHERE active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataModel($condition){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT A.id, model,B.brand FROM cars_models_table AS A 
            INNER JOIN cars_brands_table AS B ON A.brand=B.id
            WHERE A.active=1 AND B.active=1 $condition
            ORDER BY B.brand ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setDataRegion($id,$region){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $data=NULL;
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO cars_regions_table (id,region) VALUES (?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
		$sql->bindValue(2, $region);
		return $sql->execute();
	}

    public function getDataRegionById($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_regions_table WHERE id=? AND active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeStatusRegion($id,$active){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_regions_table SET active=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $active);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }
    
    public function updateDataRegion($id,$region){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_regions_table SET region=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $region);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }

    public function setDataBrand($id,$brand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $data=NULL;
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO cars_brands_table (id,brand) VALUES (?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
		$sql->bindValue(2, $brand);
		return $sql->execute();
	}

    public function getDataBrandById($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_brands_table WHERE id=? AND active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeStatusBrand($id,$active){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_brands_table SET active=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $active);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }
    
    public function updateDataBrand($id,$brand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_brands_table SET brand=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $brand);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }

    public function setDataModel($id,$model,$brand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $data=NULL;
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO cars_models_table (id,model,brand) VALUES (?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $model);
		$sql->bindValue(3, $brand);
		return $sql->execute();
	}

    public function getDataModelById($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_models_table WHERE id=? AND active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeStatusModel($id,$active){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_models_table SET active=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $active);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }
    
    public function updateDataModel($id,$model,$brand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_models_table SET model=?,brand=? WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $model);
        $sql->bindValue(2, $brand);
        $sql->bindValue(3, $id);
        return $sql->execute();
    }
}

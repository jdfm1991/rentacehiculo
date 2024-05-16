<?php
require_once("../../../conection.php");

class Rent extends Conectar{

    public function DataRent($id,$user,$option,$fechar,$fechae,$dias,$mont,$payment,$condition,$now){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO rent_table(id, user, car, dateout, datein, day, mont, payment,status,daterent) VALUES (?,?,?,?,?,?,?,?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
		$sql->bindValue(2, $user);
        $sql->bindValue(3, $option);
        $sql->bindValue(4, $fechar);
		$sql->bindValue(5, $fechae);
        $sql->bindValue(6, $dias);
        $sql->bindValue(7, $mont);
		$sql->bindValue(8, $payment);
		$sql->bindValue(9, $condition);
		$sql->bindValue(10, $now);
		return $sql->execute();
	}

	public function getRequest($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT A.id,D.brand, E.model, C.anno, daterent, mont, day FROM rent_table AS A 
			INNER JOIN status_table AS B ON A.status = B.id
			INNER JOIN cars_table AS C ON A.car = C.id
			INNER JOIN cars_brands_table AS D ON D.id = C.brand
			INNER JOIN cars_models_table AS E ON E.id = C.model
			WHERE A.user=? And A.status=1
			ORDER BY daterent DESC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRequest($id,$condition){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE rent_table  SET status  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $condition);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }


}


<?php
require_once("../../../conection.php");

class Rent extends Conectar{

    public function getDataUserById($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM users_data_table WHERE user=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCarById($option){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT B.brand AS brand, C.model AS model, anno, plate, cost FROM cars_table AS A 
            INNER JOIN cars_brands_table AS B ON A.brand=B.id
            INNER JOIN cars_models_table AS C  ON A.model=C.id WHERE A.id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $option);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataRequestByUser($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT A.id,nameu,phone,letter,dni,D.brand, E.model,anno,plate,cost,daterent,datein,dateout,mont,day,payment,B.status FROM rent_table AS A 
			INNER JOIN rent_status_table AS B ON A.status = B.id
			INNER JOIN cars_table AS C ON A.car = C.id
			INNER JOIN cars_brands_table AS D ON D.id = C.brand
			INNER JOIN cars_models_table AS E ON E.id = C.model
            INNER JOIN users_data_table AS F ON A.user = F.user
			WHERE A.user=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataRequestPendingByUser($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT A.id,A.car,D.brand, E.model, C.anno, daterent, mont, day FROM rent_table AS A 
			INNER JOIN rent_status_table AS B ON A.status = B.id
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

    public function getDataRequestById($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT daterent,nameu,F.phone,letter,dni,email,address,D.brand, E.model,anno,plate,cost,datein,dateout,mont,day,payment,B.status,H.method,datepayment,reference FROM rent_table AS A 
			INNER JOIN rent_status_table AS B ON A.status = B.id
			INNER JOIN cars_table AS C ON A.car = C.id
			INNER JOIN cars_brands_table AS D ON D.id = C.brand
			INNER JOIN cars_models_table AS E ON E.id = C.model
            INNER JOIN users_data_table AS F ON A.user = F.user
            INNER JOIN users_table AS G ON A.user = G.id
            INNER JOIN payment_methods_table AS H ON A.method=H.id
			WHERE A.id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendDataRent($id,$user,$option,$fechar,$fechae,$dias,$mont,$method,$fechap,$reference,$payment,$condition,$now){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO rent_table(id, user, car, dateout, datein, day, mont, payment,status,daterent,datepayment,method,reference) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
        $sql->bindValue(11, $fechap);
		$sql->bindValue(12, $method);
		$sql->bindValue(13, $reference);
		return $sql->execute();
	}

    public function updateDataRequest($id,$condition){
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

    public function getDataPaymentMethod(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM payment_methods_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataPaymentMethodById($method){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM payment_methods_table WHERE id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $method);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function changeStatusCarById($option,$carstatus){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE cars_table  SET status  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $carstatus);
        $sql->bindValue(2, $option);
        return $sql->execute();
    }


}


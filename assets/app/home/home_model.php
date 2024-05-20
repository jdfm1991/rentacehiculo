<?php
require_once("../../../conection.php");

class User extends Conectar{

    public function getLoginUser($email){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT A.id AS id,email, passw, idtype, type FROM users_table AS A INNER JOIN user_type_table AS B ON A.idtype=B.id WHERE email=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setDataLogin($id,$email,$passenc,$type){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO users_table (id,email,passw,idtype) VALUES(?,?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
		$sql->bindValue(2, $email);
        $sql->bindValue(3, $passenc);
        $sql->bindValue(4, $type);
		return $sql->execute();
	}

    public function setDataUser($id,$name,$phone){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();
 		//QUERY
			$sql="INSERT INTO users_data_table (user,nameu,phone) VALUES(?,?,?)";
		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1, $id);
        $sql->bindValue(2, $name);
        $sql->bindValue(3, $phone);
		return $sql->execute();
	}

    public function getforgetUser($email){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT email, nameu, phone FROM users_table AS A INNER JOIN users_data_table AS B ON A.id=B.user WHERE email=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


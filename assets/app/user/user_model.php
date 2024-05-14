<?php
require_once("../../../conection.php");

class Client extends Conectar{

    public function getDataUser($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM `users_data_table` WHERE user=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOptionUser($option){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT B.brand AS brand, C.model AS model, anno, plate  FROM cars_table AS A 
            INNER JOIN cars_brands_table AS B ON A.brand=B.id
            INNER JOIN cars_models_table AS C  ON A.model=C.id WHERE A.id=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $option);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataProfile($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT nameu, address, imguser, phone, letter, dni, imgdni, status, email, passw FROM users_data_table AS A 
            INNER JOIN users_table AS B ON A.user=B.id
            WHERE user=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user);
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

    public function countdata($ownerid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT COUNT(*) AS N FROM owners WHERE id = '$ownerid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['N']);
        

    }

    public function savedata($nameowner,$phoneowner,$igowner,$ligowner,$nombre_img){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO owners (own,phone,igsocial,ligsocial,Oimage) VALUES(?,?,?,?,?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1, $nameowner);
        $sql->bindValue(2, $nameowner);
        $sql->bindValue(3, $igowner);
        $sql->bindValue(4, $ligowner);
        $sql->bindValue(5, $nombre_img);


		return $sql->execute();

	}

    public function updatedata($ownerid,$nameowner,$phoneowner,$igowner,$ligowner){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();


        ///QUERY

        $sql="UPDATE owners  SET own  = '$nameowner', phone  = '$phoneowner', igsocial  = '$igowner', ligsocial = '$ligowner' WHERE id = '$ownerid'";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatedata1($ownerid,$nameowner,$phoneowner,$igowner,$ligowner,$nombre_img){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();


        ///QUERY

        $sql="UPDATE owners  SET own  = '$nameowner', phone  = '$phoneowner', igsocial  = '$igowner' , ligsocial = '$ligowner', Oimage  = '$nombre_img'  WHERE id = '$ownerid'";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletedata($ownerid){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="DELETE FROM owners WHERE id ='$ownerid'";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $sql;

    }

}


<?php
require_once("../../../conection.php");

class User extends Conectar{

    public function getLoginUser($email,$passw){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM users_table AS A INNER JOIN user_type_table AS B ON A.idtype=B.id WHERE email=? AND passw=?";
          
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $passw);
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


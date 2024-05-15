<?php
require_once("../../../conection.php");

class Client extends Conectar{

    public function getDataUser($user){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM users_data_table WHERE user=?";
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
            $sql="SELECT B.brand AS brand, C.model AS model, anno, plate, cost FROM cars_table AS A 
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

    public function UserUpdateAll($user,$email,$passw){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table  SET email  = ?, passw  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $passw);
        $sql->bindValue(3, $user);
        return $sql->execute();
    }

    public function UserUpdate($user,$email){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table SET email  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $user);
        return $sql->execute();
    }

    public function ImgUserUpdateAll($user,$email,$passw,$imageu){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table  SET email  = ?, passw  = ?, imguser  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $passw);
        $sql->bindValue(3, $imageu);
        $sql->bindValue(4, $user);
        return $sql->execute();
    }

    public function ImgUserUpdate($user,$email,$imageu){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table SET email  = ?, imguser  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $imageu);
        $sql->bindValue(3, $user);
        return $sql->execute();
    }

    public function UserDataUpdateAll($user,$name,$pdnil,$pdnin,$phone,$address){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_data_table SET nameu=?,address=?,phone=?,letter=?,dni=? WHERE user = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $name);
        $sql->bindValue(2, $address);
        $sql->bindValue(3, $phone);
        $sql->bindValue(4, $pdnil);
        $sql->bindValue(5, $pdnin);
        $sql->bindValue(6, $user);
        return $sql->execute();
    }

    public function ImgUserDataUpdateAll($user,$name,$pdnil,$pdnin,$phone,$address,$idsupport){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_data_table SET nameu=?,address=?,phone=?,letter=?,dni=?,imgdni=? WHERE user = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $name);
        $sql->bindValue(2, $address);
        $sql->bindValue(3, $phone);
        $sql->bindValue(4, $pdnil);
        $sql->bindValue(5, $pdnin);
        $sql->bindValue(6, $idsupport);
        $sql->bindValue(7, $user);
        return $sql->execute();
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


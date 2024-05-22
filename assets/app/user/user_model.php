<?php
require_once("../../../conection.php");

class User extends Conectar{

    public function getDataUserAll(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT user,nameu, address, phone, status, email, type FROM users_data_table AS A 
            INNER JOIN users_table AS B ON A.user=B.id
            INNER JOIN user_type_table AS C ON C.id=B.idtype
            WHERE active=1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setNewStatusActive($id,$active){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table SET active=? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $active);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }

    public function getDataUserByID($id){
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
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setNewStatus($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_data_table SET status=1 WHERE user=?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        return $sql->execute();
    }

    public function ImgUserUpdateAll($id,$email,$passw,$imageu){
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
        $sql->bindValue(4, $id);
        return $sql->execute();
    }

    public function ImgUserUpdate($id,$email,$imageu){
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
        $sql->bindValue(3, $id);
        return $sql->execute();
    }

    public function UserUpdateAll($id,$email,$passw){
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
        $sql->bindValue(3, $id);
        return $sql->execute();
    }

    public function UserUpdate($id,$email){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        ///QUERY
            $sql="UPDATE users_table SET email  = ? WHERE id = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $id);
        return $sql->execute();
    }

    public function ImgUserDataUpdateAll($id,$name,$pdnil,$pdnin,$phone,$address,$idsupport){
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
        $sql->bindValue(7, $id);
        return $sql->execute();
    }

    public function UserDataUpdateAll($id,$name,$pdnil,$pdnin,$phone,$address){
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
        $sql->bindValue(6, $id);
        return $sql->execute();
    }    

}


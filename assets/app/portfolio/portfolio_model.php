<?php
require_once("../../../conection.php");

class Portfolio extends Conectar{

    public function getDataPortfolio($begin,$finish){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT  A.id,anno,B.model AS model, C.brand AS brand FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            ORDER BY A.id ASC
            LIMIT $begin,$finish";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataImgPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT image FROM cars_images_table WHERE car = ? LIMIT 1";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['image']);
    }

    public function getDataDetailsPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT A.id,anno,B.model AS model, C.brand AS brand, A.description AS descrip FROM cars_table AS A 
            INNER JOIN cars_models_table AS B ON A.model=B.id
            INNER JOIN cars_brands_table AS C ON A.brand=C.id
            INNER JOIN cars_images_table AS D ON A.id=D.car
            WHERE A.id=?
            ORDER BY A.id ASC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataImgDetailsPortfolio($id){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT image FROM cars_images_table WHERE car = ?";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDataPortfolios(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataModel(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_models_table";
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
            $sql="SELECT * FROM cars_brands_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataRegion(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT * FROM cars_regions_table";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataAnno(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
        //QUERY
            $sql="SELECT DISTINCT anno FROM `cars_table` ORDER BY anno DESC";
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
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


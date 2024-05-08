<?php
# BASES DE DATOS
/* base de datos de SAINT **/
include_once("env.php");
class Conectar {
	protected $dbh;
	protected function conexion() {
		try {
			$conectar = $this->dbh = new PDO("mysql:hostr=".SERVER_BD_1.";dbname=".NAME_BD_1,USER_BD_1,PASSWORD_BD_1);
			return $conectar;
		} catch (Exception $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function set_names(){
		return $this->dbh->query("SET NAMES 'utf8'");
	}
}
?>
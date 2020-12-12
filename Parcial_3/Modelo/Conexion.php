<?php 
class Conexion{	

	public static function conectar(){
		$con = mysqli_connect("localhost", "anillonaiver", "naiver3753313", "bibliotecaweb");
		return $con;
	}
	public static function desconectar(){
		mysqli_close(Conexion::conectar());
	}
}

?>
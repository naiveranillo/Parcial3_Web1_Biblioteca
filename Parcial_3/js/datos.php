<?PHP
	
	if(isset($_POST['cedula'])){
		require_once('../Modelo/Conexion.php');
		require_once('../Controlador/PrestamoControlador.php');
		$conex = Conexion::Conectar();
		$prestaControl = new PrestamoControlador();
		$cc = $_POST['cedula'];
		$libros = $prestaControl->listarLibro($cc);
		
	}
	echo $libros;//Retorno la Info Solicitada
	$conex = Conexion::desconectar();
	
	
	

?>
<?php  

/**
 * 
 */
class LibroModelo
{

	private $conex;
	public function __construct()
	{
		require_once('Conexion.php');
        $this->conex = Conexion::Conectar();
	}

	public function validarISBN($cod){

        $resultado = $this->conex->query("SELECT * FROM libro WHERE codigo_isbn = '$cod'");
        if($resultado->fetch_assoc()){
            return true;
        }else{
            return false;
        }

        $this->conex = Conexion::Desconectar();
    }

    public function validarId($codisbn, $codejem)
    {
    	$id = $codisbn+$codejem;
    	$resultado = $this->conex->query("SELECT * FROM ejemplar WHERE id = '$id'");

    	if($resultado->fetch_assoc())
    	{
    		return true;
    	}else{
    		return false;
    	}
    	$this->conex = Conexion::Desconectar();
    }


    public function agregarLib($lib,$codejem){
        $nom=$lib->getNombre();
        $codisbn=$lib->getCod_isbn();
        $codcateg=$lib->getCod_categ();
        $cant=$lib->getCantidad();
        $id = $codisbn.$codejem;
        if($codejem == "vacio")
        {
        	if($this->conex->query("INSERT INTO libro (codigo_isbn, nombre_L, cod_categoria_L, cantidad)
                                    VALUES ('$codisbn','$nom','$codcateg','$cant')")){
				return true;
			}else{
				return false;
			}
        }else{
        	if($this->conex->query("INSERT INTO ejemplar (id,cod_isbn, cod_ejemplar, estado)
                                    VALUES ('$id','$codisbn','$codejem','disponible')") AND $this->conex->query("UPDATE libro SET cantidad = cantidad+1 WHERE codigo_isbn = '$codisbn'")){
				return true;
			}else{
				return false;
			}
        }

        $this->conex = Conexion::Desconectar();
    }

    public function buscarLib($cod){

        $resultado = $this->conex->query("SELECT * FROM libro, categoria WHERE codigo_isbn = '$cod' AND cod_categoria_L = cod_categoria");
        $lista = array();
        $datos=null;
        if($fil = $resultado->fetch_assoc()){
            $datos = new Libro();
            $datos->setNombre($fil["nombre_L"]);
            $datos->setCod_isbn($fil["codigo_isbn"]);
            $datos->setCod_categ($fil["cod_categoria_L"]);
            $datos->setCantidad($fil['cantidad']); 
            $lista['nomcat'] = $fil['nombre']; 
            $lista[] = $datos;
        }
        return $lista;
        $this->conex = Conexion::Desconectar();
    }

    public function listarLibro($opc){
        $lista=array();

        if ($opc == 1) {
        	$resultado = $this->conex->query("SELECT * FROM libro, categoria WHERE cod_categoria_L=cod_categoria ORDER BY codigo_isbn");
        }else{
        	$resultado = $this->conex->query("SELECT * FROM libro, categoria WHERE cod_categoria_L=cod_categoria ORDER BY nombre");
        }
        
        while($fil = $resultado->fetch_assoc()){
            $lib= new Libro();
            $lib->setNombre($fil["nombre_L"]);
            $lib->setCod_isbn($fil["codigo_isbn"]);
            $lib->setCod_categ($fil["nombre"]);
            $lib->setCantidad($fil['cantidad']);
            $lista[] = $lib;
        }

        return $lista;
        $this->conex = Conexion::Desconectar();
    }

    public function ListarLibEjem($ced)
    {
        $lista = array();
        $lista = null;
        $resultado = $this->conex->query("SELECT cod_isbn_P, cod_ejemp_P, cedula_P, nombre_L FROM prestamo, libro WHERE cedula_P = '$ced' AND cod_isbn_P = codigo_isbn");


        while($fil = $resultado->fetch_assoc())
        {
            $lista['cod_isbn'][] = $fil['cod_isbn_P'];
            $lista['cod_ejem'][] = $fil['cod_ejemp_P'];
            $lista['cedula'] = $fil['cedula_P'];
            $lista['nom_lib'][] = $fil['nombre_L'];
        }

        return $lista;
        $this->conex = Conexion::Desconectar();
    }
}



?>
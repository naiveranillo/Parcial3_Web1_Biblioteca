<?php  

/**
 * 
 */
class CategoriaModelo
{
	
	private $conex;
	function __construct()
	{
		require_once('Conexion.php');
        $this->conex = Conexion::Conectar();
	}

	public function agregarCateg($categ){
        $nom=$categ->getNombre();
        $cod=$categ->getCod_categ();

        if($this->conex->query("INSERT INTO categoria (cod_categoria, nombre)
                                    VALUES ('$cod','$nom')")){
			return true;
		} else{
			return false;
		}
        $this->conex = Conexion::Desconectar();
    }

    public function ValidarCod($cod)
    {
    	$result = $this->conex->query("SELECT * FROM categoria WHERE cod_categoria = '$cod'");

    	if($result->fetch_assoc())
    	{
    	 	return true;
    	}else{
    		return false;
    	}

    }

    public function ComboboxCateg()
    {
        $resul = $this->conex->query("SELECT * FROM categoria");
        $categs=array();
        while($fil = $resul->fetch_assoc()){

            $categs['nombre'][] = $fil["nombre"];
            $categs['cod'][] = $fil["cod_categoria"];
  
        }
        
        return $categs;
        $this->conex = Conexion::Desconectar();
    }

    public function EliminarCateg($cod)
    {
        
        if($this->conex->query("DELETE FROM categoria WHERE cod_categoria = '$cod'"))
        {
            
            return true;
        }else{
            
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function Existe_Categ_Libro($cod)
    {
        $result = $this->conex->query("SELECT * FROM libro WHERE cod_categoria_L = '$cod'");
        
        if ($result->fetch_assoc()) {
            
            return true;
        }else{
            
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }
}




?>
<?php  


/**
 * 
 */
class LibroControlador{
	
	public function __construct(){
		
	}

	public function agregarLibro($datosLib){
        require_once('Modelo/Libro.php');
        require_once('Modelo/LibroModelo.php');
        $lib = new Libro();
        $libModel = new LibroModelo();
        $codejem = "vacio";
        $cant = 0;
        $lib->setCod_isbn($datosLib["codisbn"]);
        $lib->setCod_categ($datosLib["nomcat"]);
        $lib->setNombre($datosLib["nomlib"]);
        $lib->setCantidad($cant);
        if(!empty($datosLib["codejem"]))
        {
        	$codejem = $datosLib["codejem"];
        	if($libModel->validarId($datosLib['codisbn'], $codejem))
        	{
        		return false;
        	}else{
        		return $libModel->agregarLib($lib,$codejem);
        	}
        }else{
			if($libModel->validarISBN($datosLib["codisbn"]))
        	{
        		return false;
        	}else{

        		return $libModel->agregarLib($lib,$codejem);
        	}
        }  
    }

    public function ListarLibro($datos)
    {
    	require_once('Modelo/Libro.php');
        require_once('Modelo/LibroModelo.php');
		$lib = new Libro();
        $libModel = new LibroModelo();
        $lista = array();
        $listLib = array();

        if($libModel->validarISBN($datos['codlib']))
        {
        	$lista = $libModel->buscarLib($datos['codlib']);

	        $lib = $lista[0];
	        $listLib['nombre'] = $lib->getNombre();
	        $listLib['codisbn'] = $lib->getCod_isbn();
	        $listLib['codcateg'] = $lib->getCod_categ();
	        $listLib['cantidad'] = $lib->getCantidad();
	        $listLib['nomcat'] = $lista['nomcat'];
	        $listLib['opcvista'] = "true"; 

	        return $listLib;
        }else{
        	return false;
        }
    }

    public function tablaLibro($datos)
    {
        require_once('Modelo/Libro.php');
        require_once('Modelo/LibroModelo.php');
        $lib = new Libro();
        $libModel = new LibroModelo();
        $lista = array();
        $listLib = array();
        $lista = $libModel->listarLibro($datos['opc']);

        for ($i=0; $i <count($lista) ; $i++) { 
            $lib = $lista[$i];
            $listLib['nombre'][] = $lib->getNombre();
            $listLib['codisbn'][] = $lib->getCod_isbn();
            $listLib['codcateg'][] = $lib->getCod_categ();
            $listLib['cantidad'][] = $lib->getCantidad();
        }

        return $listLib;
    }

    public function ListarLibEjem($datos)
    {
        require_once('Modelo/LibroModelo.php');
        $libModel = new LibroModelo();
        $lista = array();

        $lista = $libModel->ListarLibEjem($datos['usuario']);

        return $lista;
    }
}
?>
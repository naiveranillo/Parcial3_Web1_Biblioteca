<?php  

/**
 * 
 */
class CategoriaControlador
{
	
	function __construct()
	{
		
	}

	public function agregarCateg($datosCat){
        require_once('Modelo/Categoria.php');
        require_once('Modelo/CategoriaModelo.php');
        $categ = new Categoria();
        $CategModel = new CategoriaModelo();

        $categ->setNombre($datosCat["nomcateg"]);
        $categ->setCod_categ($datosCat["codcateg"]);

       
        if($CategModel->ValidarCod($categ->getCod_categ())){
            return false;
        }else{
            return $CategModel->agregarCateg($categ); 
        }   
         
    }

    public function listarTodaCateg(){
        require_once('Modelo/CategoriaModelo.php');
        $CategModel = new CategoriaModelo();
        $lista = array();
        $lista = $CategModel->ComboboxCateg();

        return $lista;
    }

    public function EliminarCateg($datos)
    {
        require_once('Modelo/CategoriaModelo.php');
        require_once('Modelo/Categoria.php');
        $CategModel = new CategoriaModelo();
        $cod =  $datos['datocat'];
        $lista = array();
        $listCateg = array();
        if ($CategModel->Existe_Categ_Libro($cod)) {  
            return false;
        }else{
            $resp = $CategModel->EliminarCateg($cod);
            $lista = $CategModel->ComboboxCateg();    

            $_SESSION['nomcat'] = $lista['nombre'];
            $_SESSION['codcat'] = $lista['cod'];

            return $resp;
        }
    }


}






?>
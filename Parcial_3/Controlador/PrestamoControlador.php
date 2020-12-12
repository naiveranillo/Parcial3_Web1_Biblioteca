<?php
class PrestamoControlador{

    public function __construct(){
        
    }

    public function prestarLibro($datos){
        require_once('Modelo/Libro.php');
        require_once('Modelo/Usuario.php');
        require_once('Modelo/Prestamos.php');
        require_once('Modelo/PrestamoModel.php');
        $libro = new Prestamos();
        $prestamoModel = new PrestamoModel();
        $libro->setCodigoIsbnP($datos['isbn']);
        $libro->setCodigoEjempP($datos['ejemplar']);
        $libro->setCedulaP($datos['usuario']);
        return $prestamoModel->prestarLibro($libro);
    }

    public function listarUsuario(){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/PrestamoModel.php');
        $usu = new Usuario();
        $prestamoModel = new PrestamoModel();
        $listUsu = array();
        $lista = $prestamoModel->listarUsuariosPrestamo();
        for($i=0; $i<count($lista);$i++){
            $usu = $lista[$i];
            $listUsu []=[$usu->getNombre(),
                            $usu->getCedula(),
                            $usu->getTipoUsuario(),
                            $usu->getCantidadLibro()];
        } 
        return $listUsu;
    }


    public function ejemplarPrestado($dato){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/Prestamos.php');
        require_once('Modelo/PrestamoModel.php');
        $libro = new Prestamos();
        $usu = new Usuario();
        $opc = $dato['opc'];
        $prestamoModel = new PrestamoModel();
        $usu->setCedula($dato);
        $resp = [];
        $lista = $prestamoModel->listarLibros($opc);
       
        for($i=0; $i<count($lista);$i++){
            $libro = new Prestamos();
            $libro = $lista[$i];
            $resp [] =[$libro->getCodigoIsbnP(),
                        $libro->getTituloP(),
                        $libro->getCodigoEjempP(),
                        $libro->getNombreUsuP(),
                        $libro->getCedulaP(),
                        $libro->getTipoUsup()];
        } 
        
        return $resp;

    }

    public function listarLibro($dato){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/Prestamos.php');
        require_once('Modelo/PrestamoModel.php');
        $libro = new Prestamos();
        $usu = new Usuario();
        $prestamoModel = new PrestamoModel();
        $usu->setCedula($dato);
        $listlibro = '';
        $lista = $prestamoModel->listarLibroPrestado($usu);
        for($i=0; $i<count($lista);$i++){
            $libro = $lista[$i];
            $libro = new Prestamos();
            $listlibro .=",".$libro->getCodigoIsbnP().$libro->getCodigoEjempP().",".$libro->getTituloP()."  ".$libro->getCodigoEjempP();
        } 
        return $listlibro;
    }

    public function buscarLibro($datos){
        require_once('Modelo/Libro.php');
        require_once('Modelo/Usuario.php');
        require_once('Modelo/Prestamos.php');
        require_once('Modelo/PrestamoModel.php');
        $libro = new Libro();
        $prestamoModel = new PrestamoModel();
        $libro->setCod_isbn($datos['codigo']);
        $resp = [];
        $lista = $prestamoModel->buscarLibro($libro);
        
        for($i=0; $i<count($lista['ejemplar']);$i++){
            $libro = new Libro();
            $libro = $lista['ejemplar'][$i];
            $resp['ejemplar'][]=[$libro->getNombre()];
        }
        for($i=0; $i<count($lista['usuario']);$i++){
            $usu = new Usuario();
            $usu = $lista['usuario'][$i];
            
            $resp['usuario'][]=[$usu->getNombre(),$usu->getCedula()];
        }  
   
        $resp['libro']=$lista['libro'];
        return $resp;
    }

    public function Entrega($datos)
    {
        require_once('Modelo/Prestamos.php');
        require_once('Modelo/PrestamoModel.php');
        $prestamoModel = new PrestamoModel();
        $arr = explode(",", $datos["libro"]);
        $codisbn = $arr[0];
        $codejem = $arr[1];
        $ced = $datos['ced'];

        if ($prestamoModel->EliminarPrestamo($codisbn, $codejem, $ced)) {
            
            $idEjem = $codisbn.$codejem;
            if($prestamoModel->cambiarEstadoOn($idEjem))
            {
                if ($prestamoModel->disminuirLibrosUsuario($ced)) {
                    
                    if($prestamoModel->aumentarLibroDispo($codisbn)){

                        $_SESSION['UsuEntrega'] = $this->listarUsuario();

                        return true;
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
?>
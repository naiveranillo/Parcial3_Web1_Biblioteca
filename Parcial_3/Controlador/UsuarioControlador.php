<?php 
class UsuarioControlador{

    public function __construct(){
        
    }

    public function validarUsu($datos){
        require_once('Modelo/UsuarioModel.php');
        $usuModel = new UsuarioModel();
        return $usuModel->validarUsu($datos);
    }


    public function agregarUsu($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $usu->setNombre($datos["nombre"]);
        $usu->setCedula($datos["cedula"]);
        $usu->setFechaNaci($datos["fecha"]);
        $usu->setSexo($datos["sexo"]);
        $usu->setTipoUsu($datos["tipoUsu"]);
        $usu->setEstado('inactivo');
        $usu->getCantidadLibro('0');
        if($this->validarUsu($usu)){
            return false;
        }else{
            return $usuModel->agregarUsuario($usu);
        }
        
    }

    public function listarUsuario($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $listUsu = array();
        /* $usu->setTipoUsu($datos['tipoUsu']); */
        $usu->setTipoUsu($datos['tipoUsu']);
        $lista = $usuModel->listarUsuario($usu);
        for($i=0; $i<count($lista);$i++){
            $usu = $lista[$i];
            $listUsu []=[$usu->getNombre(),
                            $usu->getCedula(),
                            $usu->getFechaNaci(),
                            $usu->getSexo(),
                            $usu->getTipoUsuario(),
                            $usu->getEstado(),
                            $usu->getCantidadLibro()];
        } 
        return $listUsu;
    }
    
    public function activarUsuario($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $usu->setCedula($datos['usuario']);
        return $usuModel->activarUsuario($usu);
    }

    public function listarUsuarioEstado($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $listUsu = array();
        $usu->setEstado($datos['estado']);
        $lista = $usuModel->listarUsuarioEstado($usu);
        for($i=0; $i<count($lista);$i++){
            $usu = $lista[$i];
            $listUsu[] = [$usu->getNombre(),
                            $usu->getCedula(),
                            $usu->getTipoUsuario(),
                            $usu->getEstado()];
        } 
        return $listUsu;
    }

    

    public function buscarUsuario($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $usu->setCedula($datos['cedula']);
        return $usuModel->buscarUsu($usu);
    }
    
    

    public function modificarUsuario($datos){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/UsuarioModel.php');
        $usu = new Usuario();
        $usuModel = new UsuarioModel();
        $usu->setNombre($datos['nombre']);
        $usu->setSexo($datos['sexo']);
        $usu->setFechaNaci($datos['fecha']);
        $usu->setTipoUsu($datos['tipoUsu']);
        $usu->setCedula($datos['cedula']);
        return $usuModel->modificarUsuario($usu);
        
    }

}

?>
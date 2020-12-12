<?php 
class LoginControlador{

    public function __construct(){
        
    }


    public function login($dato){
        require_once('Modelo/Usuario.php');
        require_once('Modelo/LoginModel.php');
        $usuario = new Usuario();
        $loginModel = new LoginModel();
        $usuario->setNombre($dato["username"]);
        $usuario->setCedula($dato["contrasena"]);
        $sw;
        $respuesta = $loginModel->login($usuario);
        
        if($respuesta){
            $sw=true;
            $_SESSION['registro']='ok';
            $_SESSION['persona']=array('nombre' => $respuesta->getNombre(),
                                    'cedula' => $respuesta->getCedula());
            header("Location: ./index.php?ind=inicio");
        }else{
            $_SESSION['registro']='fail';
            $sw=false;
        }
    }
}

?>
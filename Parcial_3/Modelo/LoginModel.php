<?php 
class LoginModel{

    private $conex;
    public function __construct(){
        require_once('Conexion.php');
        $this->conex = Conexion::Conectar();

    }

    public function login($user){
        $username = $user->getNombre();
        $contrasena = $user->getCedula();
        $resultado = $this->conex->query("SELECT * FROM usuario WHERE nombre='$username' 
                                                                AND cedula_U='$contrasena'");
        if($fil = $resultado->fetch_assoc()){
            $user = new Usuario();
            $user->setNombre($fil["nombre"]);
            $user->setCedula($fil["cedula_U"]);
            $user->setTipoUsu($fil["tipo_usu"]);
            return $user;
        }else{
            return null;
        }
        
        
        $this->conex = Conexion::Desconectar();
    }

    
}
?>
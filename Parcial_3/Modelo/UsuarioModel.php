<?php 
class UsuarioModel{

    private $conex;
    public function __construct(){
        require_once('Conexion.php');
        $this->conex = Conexion::Conectar();

    }

    

    public function validarUsu($dato){
        $user=$dato->getCedula();
        $resultado = $this->conex->query("SELECT * FROM usuario WHERE cedula_U='$user'");
        if($resultado->fetch_assoc()){
            return true;
        }else{
            return false;
        }

        $this->conex = Conexion::Desconectar();
    }

    public function agregarUsuario($dato){
        $nom=$dato->getNombre();
        $cedu=$dato->getCedula();
        $fecha=$dato->getFechaNaci();
        $sexo=$dato->getSexo();
        $tipo=$dato->getTipoUsuario();
        $estado=$dato->getEstado();
        $libros=$dato->getCantidadLibro();
        if($this->conex->query("INSERT INTO usuario (nombre, cedula_U, fecha_nac, sexo, tipo_usu, estado, cant_libros)
                                    VALUES ('$nom','$cedu','$fecha','$sexo','$tipo','$estado','$libros')")){
			return true;
		} else{
			return false;
		}
        $this->conex = Conexion::Desconectar();
    }

     public function listarUsuario($datos){
        $tipo = $datos->getTipoUsuario();
        if($tipo=='Todos'){
            $resultado = $this->conex->query("SELECT * FROM usuario WHERE tipo_usu!='Administrador'");
        }else{
            $resultado = $this->conex->query("SELECT * FROM usuario WHERE tipo_usu='$tipo'");
        }
        $usuarios=array();
        while($fil = $resultado->fetch_assoc()){
            $user = new Usuario();
            $user->setNombre($fil["nombre"]);
            $user->setCedula($fil["cedula_U"]);
            $user->setFechaNaci($fil["fecha_nac"]);
            $user->setSexo($fil['sexo']);
            $user->setTipoUsu($fil['tipo_usu']);
            $user->setEstado($fil['estado']);
            $user->setCantidadLibro($fil['cant_libros']);
            $usuarios[] = $user;
        }
        return $usuarios;
        $this->conex = Conexion::Desconectar();

    }
    
    public function activarUsuario($datos){
        $cedu= $datos->getCedula();
        $resultado = $this->conex->query("UPDATE usuario SET estado='activo' WHERE cedula_U='$cedu'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function listarUsuarioEstado($datos){
        $estado=$datos->getEstado();
        $resultado = $this->conex->query("SELECT * FROM usuario WHERE estado='$estado'");
        $usuarios=array();
        while($fil = $resultado->fetch_assoc()){
            $user = new Usuario();
            $user->setNombre($fil["nombre"]);
            $user->setCedula($fil["cedula_U"]);
            $user->setTipoUsu($fil['tipo_usu']);
            $user->setEstado($fil['estado']);
            $usuarios[] = $user;
        }
        return $usuarios;
        $this->conex = Conexion::Desconectar();

    }
    
    
    

    public function buscarUsu($datos){
        $user = $datos->getCedula();
        $resultado = $this->conex->query("SELECT nombre, cedula_U, fecha_nac, sexo, estado, tipo_usu 
                                                    FROM usuario WHERE cedula_U='$user'");
        $usua=null;
        if($fil = $resultado->fetch_assoc()){
            $usua = new Usuario();
            $usua->setNombre($fil["nombre"]);
            $usua->setCedula($fil["cedula_U"]);
            $usua->setFechaNaci($fil["fecha_nac"]);
            $usua->setSexo($fil['sexo']);
            $usua->setEstado($fil['estado']);
            $usua->setTipoUsu($fil['tipo_usu']);
        }
        return $usua;
        $this->conex = Conexion::Desconectar();
    }
    


    public function modificarUsuario($datos){
        $nombre = $datos->getNombre(); 
        $cedula = $datos->getCedula();
        $fecha = $datos->getFechaNaci();
        $sexo = $datos->getSexo();
        $tipo = $datos->getTipoUsuario();
        $resultado = $this->conex->query("UPDATE usuario SET nombre='$nombre',
                                                                fecha_nac='$fecha', 
                                                                sexo='$sexo',
                                                                tipo_usu='$tipo' WHERE cedula_U='$cedula'");

        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

}
?>
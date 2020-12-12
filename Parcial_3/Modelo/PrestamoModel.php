<?php
class PrestamoModel{

    private $conex;
    public function __construct(){
        require_once('Conexion.php');
        $this->conex = Conexion::Conectar();

    }

    public function prestarLibro($dato){
        $isbn = $dato->getCodigoIsbnP();
        $ejemplar = $dato->getCodigoEjempP();
        $cedula = $dato->getCedulaP();
        $idPrestamo = $isbn.$ejemplar.$cedula;
        $idEjemplar = $isbn.$ejemplar;
        if($this->conex->query("INSERT INTO prestamo (id_prestamo, cod_isbn_P, cod_ejemp_P, cedula_P)
                                    VALUES ('$idPrestamo','$isbn','$ejemplar','$cedula')")){
            $estado = $this->cambiarEstadoOff($idEjemplar);
            $usu = $this->aumentarLibrosUsuario($cedula);
            $cantLibro = $this->desminuirLibroDispo($isbn);
            if($estado && $usu){
                return true;
            }else{
                return false;
            }
		} else{
			return false;
		}
        $this->conex = Conexion::Desconectar();
    }

    public function desminuirLibroDispo($dato){
        $resultado = $this->conex->query("UPDATE libro SET cantidad=cantidad-1 WHERE codigo_isbn='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function aumentarLibroDispo($dato){
        $resultado = $this->conex->query("UPDATE libro SET cantidad=cantidad+1 WHERE codigo_isbn='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function aumentarLibrosUsuario($dato){
        $resultado = $this->conex->query("UPDATE usuario SET cant_libros=cant_libros+1 WHERE cedula_U='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function disminuirLibrosUsuario($dato){
        $resultado = $this->conex->query("UPDATE usuario SET cant_libros=cant_libros-1 WHERE cedula_U='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function cambiarEstadoOff($dato){
        $resultado = $this->conex->query("UPDATE ejemplar SET estado='prestado' WHERE id='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }
    public function cambiarEstadoOn($dato){
        $resultado = $this->conex->query("UPDATE ejemplar SET estado='disponible' WHERE id='$dato'");
        if($resultado){
            return true;
        }else{
            return false;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function listarUsuario(){
        $resultado = $this->conex->query("SELECT * FROM usuario 
                                                    WHERE (tipo_usu='Profesor' AND cant_libros<3) AND estado='activo'
                                                        OR (tipo_usu='Estudiante' AND cant_libros<2) AND estado='activo'");
        $usuario=array();
        while($fil = $resultado->fetch_assoc()){
            $usu = new Usuario();
            $usu->setNombre($fil["nombre"]);
            $usu->setCedula($fil['cedula_U']);
            $usuario[] = $usu;
        }
        return $usuario;
        $this->conex = Conexion::Desconectar();
    }

    public function listarEjemplar($dato){
        $resultado = $this->conex->query("SELECT * FROM ejemplar WHERE cod_isbn='$dato' AND estado='disponible'");
        $ejemplar=array();
        while($fil = $resultado->fetch_assoc()){
            $lib = new Libro();
            $lib->setNombre($fil["cod_ejemplar"]);
            $ejemplar[] = $lib;
        }
        return $ejemplar;
        $this->conex = Conexion::Desconectar();
    }

    public function buscarLibro($datos){
        $cod = $datos->getCod_isbn();
        $resultadoBusqueda = $this->conex->query("SELECT nombre_L, codigo_isbn, cantidad 
                                                    FROM libro WHERE codigo_isbn='$cod' AND cantidad>3");
        
        $lib=null;
        $ejemplar=null;
        $usuario=null;
        if($fil = $resultadoBusqueda->fetch_assoc()){
            $lib = new Libro();
            $lib->setNombre($fil["nombre_L"]);
            $lib->setCod_isbn($fil['codigo_isbn']);
            $ejemplar = $this->listarEjemplar($cod);
            $usuario = $this->listarUsuario();
        }
        $resp['libro']=$lib;
        $resp['ejemplar']=$ejemplar;
        $resp['usuario']=$usuario;
        return $resp;
        $this->conex = Conexion::Desconectar();

    }

    public function listarLibros($dato){
        $libro=array();
        if($dato==1){
            $resultado = $this->conex->query("SELECT nombre, tipo_usu,
                                                        nombre_L, 
                                                        cod_isbn_P, cod_ejemp_P, cedula_P
                                                        FROM prestamo, libro, usuario 
                                                        WHERE cedula_P=cedula_U AND cod_isbn_P=codigo_isbn");

            
            while($fil = $resultado->fetch_assoc()){
                $lib = new Prestamos();
                $lib->setTituloP($fil["nombre_L"]);
                $lib->setCodigoIsbnP($fil["cod_isbn_P"]);
                $lib->setCodigoEjempP($fil["cod_ejemp_P"]);
                $lib->setNombreUsuP($fil["nombre"]);
                $lib->setCedulaP($fil["cedula_P"]);
                $lib->setTipoUsuP($fil["tipo_usu"]);
                $libro[] = $lib;
            }
            
            return $libro;
        }else{
            $resultado = $this->conex->query("SELECT nombre_L, codigo_isbn, cod_ejemplar FROM ejemplar, libro WHERE estado='disponible'
                                                                                                                AND codigo_isbn=cod_isbn");

            while($fil = $resultado->fetch_assoc()){
                $lib = new Prestamos();
                $lib->setTituloP($fil["nombre_L"]);
                $lib->setCodigoIsbnP($fil["codigo_isbn"]);
                $lib->setCodigoEjempP($fil["cod_ejemplar"]);
                $libro[] = $lib;
            }
            
            return $libro;
        }
        $this->conex = Conexion::Desconectar();
    }

    public function listarUsuariosPrestamo(){
        
        $resultado = $this->conex->query("SELECT DISTINCT nombre, cedula_U, 
                                                tipo_usu, cant_libros, 
                                                cedula_P FROM usuario, prestamo WHERE cedula_U=cedula_P");
        $usuarios=array();
        while($fil = $resultado->fetch_assoc()){
            $user = new Usuario();
            $user->setNombre($fil["nombre"]);
            $user->setCedula($fil["cedula_U"]);
            $user->setTipoUsu($fil['tipo_usu']);
            $user->setCantidadLibro($fil['cant_libros']);
            $usuarios[] = $user;
        }
        return $usuarios;
        $this->conex = Conexion::Desconectar();
    }

    public function listarLibroPrestado($dato){
        $cc = $dato->getCedula();
        $resultado = $this->conex->query("SELECT DISTINCT nombre_L, codigo_isbn, cod_ejemp_P FROM prestamo, libro 
                                                 WHERE  prestamo.cedula_P='$cc'");
        $libro=array();
        while($fil = $resultado->fetch_assoc()){
            $lib = new Prestamos();
            $lib->setTituloP($fil["nombre_L"]);
            $lib->setCodigoIsbnP($fil["codigo_isbn"]);
            $lib->setCodigoEjempP($fil["cod_ejemp_P"]);
            $libro[] = $lib;
        }
        return $libro;
        $this->conex = Conexion::Desconectar();
    }

    public function EliminarPrestamo($codisbn, $codejem, $ced)
    {
        $id = $codisbn.$codejem.$ced;

        if($this->conex->query("DELETE FROM prestamo WHERE id_prestamo = '$id'"))
        {   
            return true;
        }else{
            return false;
        }

        $this->conex = Conexion::Desconectar();

    }

}

?>
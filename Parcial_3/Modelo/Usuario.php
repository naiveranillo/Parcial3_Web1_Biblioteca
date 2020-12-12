<?php 
class Usuario{

    private $nombre;
    private $cedula;
    private $fechaNaci;
    private $sexo;
    private $tipoUsuario;
    private $estado;
    private $canLibros;

    public function __construct(){
        
    }

    
    function getNombre(){
        return $this->nombre;
    }
    function getCedula(){
        return $this->cedula;
    }
    function getFechaNaci(){
        return $this->fechaNaci;
    }
    function getSexo(){
        return $this->sexo;
    }
    function getTipoUsuario(){
        return $this->tipoUsuario;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCantidadLibro(){
        return $this->canLibros;
    }
/* ---------------------------------------------------------------- */

    function setNombre($dato){
        $this->nombre = $dato;
    }
    function setCedula($dato){
        $this->cedula = $dato;
    }
    function setFechaNaci($dato){
        $this->fechaNaci = $dato;
    }
    function setSexo($dato){
        $this->sexo = $dato;
    }
    function setTipoUsu($dato){
        $this->tipoUsuario = $dato;
    }
    function setEstado($dato){
        $this->estado = $dato;
    }
    function setCantidadLibro($dato){
        $this->canLibros = $dato;
    }

}
?>
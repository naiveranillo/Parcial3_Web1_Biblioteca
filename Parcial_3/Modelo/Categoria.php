<?php 
class Categoria{

    private $cod_categ;
    private $nombre;

    public function __construct(){
        
    }

    
    function getCod_categ(){
        return $this->cod_categ;
    }
    function getNombre(){
        return $this->nombre;
    }

/* ---------------------------------------------------------------- */

    function setCod_categ($dato){
        $this->cod_categ = $dato;
    }
    function setNombre($dato){
        $this->nombre = $dato;
    }
}
?>
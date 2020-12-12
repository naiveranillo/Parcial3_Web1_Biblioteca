<?php 
class Libro{

    private $cod_isbn;
    private $nombre;
    private $cod_categ;
    private $cantidad;

    public function __construct(){
        
    }

    
    function getCod_isbn(){
        return $this->cod_isbn;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getCod_categ(){
        return $this->cod_categ;
    }
    function getCantidad(){
        return $this->cantidad;
    }

/* ---------------------------------------------------------------- */

    function setCod_isbn($dato){
        $this->cod_isbn = $dato;
    }
    function setNombre($dato){
        $this->nombre = $dato;
    }
    function setCod_categ($dato){
        $this->cod_categ = $dato;
    }
    function setCantidad($dato){
        $this->cantidad = $dato;
    }

}
?>
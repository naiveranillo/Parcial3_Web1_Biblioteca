<?php 
class Prestamos{

    private $codigop;
    private $cedulap;
    private $codigoIsbnp;
    private $codigoEjempp;
    private $nombreusup;
    private $tipousuap;
    private $titulop;
    private $categoriap;

    public function __construct(){
        
    }

    
    function getCodigoP(){
        return $this->codigop;
    }
    function getCedulaP(){
        return $this->cedulap;
    }
    function getCodigoIsbnP(){
        return $this->codigoIsbnp;
    }
    function getCodigoEjempP(){
        return $this->codigoEjempp;
    }
    function getNombreUsuP(){
        return $this->nombreusup;
    }
    function getTipoUsup(){
        return $this->tipousuap;
    }
    function getTituloP(){
        return $this->titulop;
    }
    function getCategoriaP(){
        return $this->categoriap;
    }
/* ---------------------------------------------------------------- */

    function setCodigoP($dato){
        $this->codigop = $dato;
    }
    function setCedulaP($dato){
        $this->cedulap = $dato;
    }
    function setCodigoIsbnP($dato){
        $this->codigoIsbnp = $dato;
    }
    function setCodigoEjempP($dato){
        $this->codigoEjempp = $dato;
    }
    function setNombreUsuP($dato){
        $this->nombreusup = $dato;
    }
    function setTipoUsuP($dato){
        $this->tipousuap = $dato;
    }
    function setTituloP($dato){
        $this->titulop = $dato;
    }
    function setCategoriaP($dato){
        $this->categoriap = $dato;
    }

}
?>
<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    
    <div class="cuadros card shadow " style=" width: 25rem; position:relative; margin:0% -30%; ">
        <div class="card-header text-center">
            <div class="card-title ">
                <h5><b>Buscar Libro</b></h5>
            </div>
        </div>
        <div class="card-text text-center">
            <div class="card-text">
                <form method="post" action="index.php">
                    <div class="card-body">
                        <div class="form-group form-inline  row">
                            <label class="col-4"><b>Codigo ISBN:</b></label>
                            <input class="form-control col-4 mr-4" type="number" name="codigo" required autocomplete="off"><br>
                        
                            <input type="hidden" name="controlador" value="PrestamoControlador">
                            <input type="hidden" name="accion" value="buscarLibro">
                            <input type="hidden" name="vista" value="prestarLibroVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                            <input class="btn btn-success  " type="Submit" name="buscar" value="buscar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
if(isset($_POST['buscar'])){
    if($resp['libro']==null){
        ?>
            <div class='alert alert-warning alert-dismissible fade show text-center' 
                    role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                        El libro buscado no existe o  <br> La cantidad de ejemplares de libro es inferior 3, por lo cual no se puede realizar prestamos del libro.
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                     Ok
                </button>
            </div>
        <?php
    }else{
        
            $isbn = $resp['libro']->getCod_isbn();
           /*  var_dump($resp); */
?>
        <div class="cuadros card  shadow " style=" width: 25rem; position:absolute; margin:0% 15%;">
            <div class="card-header text-center">
                <div class="card-title ">
                    <h5><b>Datos Prestamo</b></h5>
                </div>        
            </div>
            <div class="card-text text-center">
                <div class="card-text">                        
                    <form method="post" action="index.php"> 
                        <div class="card-body">
                            <div class="form-group form-inline  row">
                                <label class="col-5">Codigo Libro</label>
                                <input class="form-control col-6" type="number" id="isbn" name="isbn"
                                        value="<?php echo $isbn?>" 
                                        readonly autocomplete="off">
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5"><b>Ejemplares</b></label>
                                <select class="form-control col-6" id="ejemplar" name="ejemplar" required>
                                    <option value="">Seleccione</option>
                                    <?php
                                    if (isset($resp['ejemplar'])) {
                                        for ($i = 0; $i < count($resp['ejemplar']); $i++) {
                                            echo '<option value="' . $resp['ejemplar'][$i][0] . '">' . $resp['ejemplar'][$i][0] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5"><b>Usuarios</b></label>
                                <select class="form-control col-6" id="usuario" name="usuario"  required>
                                    <option value="">Seleccione</option>
                                    <?php
                                    if (isset($resp['usuario'])) {
                                        for ($i = 0; $i < count($resp['usuario']); $i++) {
                                            echo '<option value="' . $resp['usuario'][$i][1] . '">' . $resp['usuario'][$i][1] . " - " .$resp['usuario'][$i][0] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                
                            </div>
                            <h6 class="col-12 text-left" style="border-bottom: 1px solid grey;padding-bottom: 1rem;">La lista muestra los usuarios activos que cumplen los requisitos para prestar libros</h6>
                            <h6 class="col-12 text-left" style="border-bottom: 1px solid grey; padding-bottom: 1rem;">Maximo de libros permitidos prestar a un profesor: 3</h6>
                            <h6 class="col-12 text-left" >Maximo de libros permitidos prestar a un estudiante: 2</h6>
                        </div>
                        <input type="hidden" name="controlador" value="PrestamoControlador">
                        <input type="hidden" name="accion" value="prestarLibro">
                        <input type="hidden" name="vista" value="prestarLibroVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                        <div class="card-footer text-center ">
                            <input class="btn btn-success " type="Submit" name="prestar" value="Prestar Libro">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php           
        }
    /* } */
}

?>

<?PHP
if(isset($_POST['prestar'])){

    if($resp==false){
?>              <div class='alert alert-warning alert-dismissible fade show text-center' 
                    role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                        No se pudo hacer el prestamo. <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                    Ok
                    </button>
                </div>
<?php
    }else{
?>
        <div class='alert alert-success alert-dismissible fade show text-center' 
                    role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                        prestamo exitoso <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                    Ok
                    </button>
                </div>
<?php
    }
} 
?>
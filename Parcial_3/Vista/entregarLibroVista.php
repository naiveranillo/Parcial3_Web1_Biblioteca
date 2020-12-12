<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
?>
<html>

<head>
        <script type="text/javascript" src="js/datos.js"></script>
</head>


</html>

    <?php
    if (is_array($resp)) {
        if (!isset($resp['cod_ejem'])) {
           $_SESSION['UsuEntrega'] = $resp;
        }
        // print_r($_SESSION['UsuEntrega']);
    }

    ?>        
            <div class="cuadros card shadow text-center p-2 " style="width: 25rem; position:relative; margin:0% -35%;">
                <div class="card-title  m-3 ">
                    <h5><b>Listado de Usuarios</b></h5>
                </div>
                <form action="index.php" method="post">
                    <div class="form-group form-inline  row">
                            <label class="col-5"><b>Usuarios</b></label>
                            <select class="form-control col-6" id="usuario" name="usuario" required>
                                <option value="">Seleccione</option>
                                <?php
                                if (isset($_SESSION['UsuEntrega'])) {
                                    for ($i = 0; $i < count($_SESSION['UsuEntrega']); $i++) {
                                        echo '<option value="' . $_SESSION['UsuEntrega'][$i][1] . '">[ ' . $_SESSION['UsuEntrega'][$i][1] . " ]  " . $_SESSION['UsuEntrega'][$i][0] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="card-title  m-3 " >
                        <input class="btn btn-success  " type="Submit" name="buslib" value="Buscar">
                    </div>
                    <div>
                        <!-- Editar -->
                        <input type="hidden" name="controlador" value="LibroControlador">
                        <input type="hidden" name="accion" value="ListarLibEjem">
                        <input type="hidden" name="vista" value="entregarLibroVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                    </div>
                </form>
            </div>

        <?php
?>

<?php
if (isset($_POST['buslib'])) {
        $ced = $resp['cedula'];
?>
<div class="cuadros card  shadow " style=" width: 30rem; position:absolute; margin:0% 15%;">
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
                                <label class="col-5">Cedula</label>
                                <input class="form-control col-6" type="number" id="ced" name="ced"
                                        value="<?php echo $ced ?>" 
                                        readonly autocomplete="off">
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5"><b>Libros</b></label>
                                <select class="form-control col-6" id="libro" name="libro"  required>
                                    <option value="">Seleccione</option>
                                    <?php
                                    if (isset($resp['cod_ejem'])) {
                                        for ($i = 0; $i < count($resp['cod_ejem']); $i++) {
                                            $opc = $resp['cod_isbn'][$i].",".$resp['cod_ejem'][$i];   
                                            echo '<option value="' .$resp['cod_isbn'][$i].",".$resp['cod_ejem'][$i].'">'.$resp['cod_isbn'][$i]." - ".$resp['nom_lib'][$i]." - ".$resp['cod_ejem'][$i].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                
                            </div>
                            <h6 class="col-12 text-center" style="border-bottom: 1px solid grey;padding-bottom: 1rem;">Libros esta estructurado de esta forma:</h6>
                            <h6 class="col-12 text-center" >Codigo ISBN / Nombre Libro / Codigo Ejemplar</h6>
                        </div>
                        <input type="hidden" name="controlador" value="PrestamoControlador">
                        <input type="hidden" name="accion" value="Entrega">
                        <input type="hidden" name="vista" value="entregarLibroVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                        <div class="card-footer text-center ">
                            <input class="btn btn-success " type="Submit" name="entreg" value="Entregar Libro">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    
    }

    if (isset($resp)) {
        if ($resp == true AND !is_array($resp)) {
            ?>
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
                    Libro Entregado con Exito. <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                        Ok
                    </button>
                </div>
            <?php
        }else{
            if ($resp == false AND !is_array($resp)) {
                ?>
                    <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
                        Libro no Entregado. <br>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                            Ok
                        </button>
                    </div>
                <?php
            }        
        }   
    }
?>
                
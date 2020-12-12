<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');

    if (is_array($resp)) {
        $_SESSION['nomcat'] = $resp['nombre'];
        $_SESSION['codcat'] = $resp['cod'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="cuadros card shadow text-center " style=" width: 35rem; height: 32rem; position:relative; left: -36%; background-color: rgb(255, 255, 255);">
        <div class="card-title"><br>
            <h4 class="text-center"><b>Registrar Libro</b></h4>
        </div>
        <div class="cuadros card shadow pl-4 pt-3 text-center" style="width: 30rem;">
            <form action="index.php" method="post">
                <div class="form-group form-inline  row ">
                    <h5 class="col-4" style="background-size: black;">Codigo ISBN:</h5>
                    <input type="text" class="form-control col-4 mr-4" name="codlib" placeholder="Digite el Codigo" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required autocomplete="off" required>
                    <input type="hidden" name="controlador" value="LibroControlador">
                    <input type="hidden" name="accion" value="ListarLibro">
                    <input type="hidden" name="vista" value="crearLibroVista">
                    <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                    <input type="hidden" name="vistaMenuS" value="menuLibro">
                    <input type="submit" class="btn btn-success " name="buslib" value="Verificar">
                </div>
            </form>
        </div>
        <div class="cuadros card shadow " style=" width: 30rem;">
            <div class="card-text text-center mt-3">
                <div class="card-text">
                    <form action="index.php" method="post">
                        <div>
                            <?php
                            if (!isset($resp['opcvista'])) {
                            ?>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Codigo ISBN</label>
                                    <input class="form-control col-6" type="text" name="codisbn" placeholder="Codigo del Libro" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required autocomplete="off">
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Codigo Ejemplar</label>
                                    <input class="form-control col-6" type="text" name="codejem" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required autocomplete="off" disabled>
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Nombre</label>
                                    <input class="form-control col-6" type="text" name="nomlib" placeholder="Nombre del Libro" required autocomplete="off">
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Categoria</label>
                                    <select class="form-control col-6" required id="nomcat" name="nomcat">
                                        <option value="">Seleccione</option>
                                        <?php
                                        if (is_array($resp)) {
                                            if (isset($resp['cod']) and isset($resp['nombre'])) {
                                                $_SESSION['nomcat'] = $resp['nombre'];
                                                $_SESSION['codcat'] = $resp['cod'];
                                            }
                                        }
                                        if (isset($_SESSION['nomcat'])) {
                                            for ($i = 0; $i < count($_SESSION['nomcat']); $i++) {

                                                echo '<option value="' . $_SESSION['codcat'][$i] . '">' . $_SESSION['nomcat'][$i] . '</option>';
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div>
                                    <input type="hidden" name="controlador" value="LibroControlador">
                                    <input type="hidden" name="accion" value="agregarLibro">
                                    <input type="hidden" name="vista" value="crearLibroVista">
                                    <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                                    <input type="hidden" name="vistaMenuS" value="menuLibro">
                                </div>
                        </div>
                        <div class="card-footer text-center ">
                            <input class="btn btn-success " type="submit" name="agregarlib" value="Agregar">
                        </div>
                    </form>
                <?php
                            } else {
                ?>
                    <form action="index.php" method="post">
                        <div>
                            <div class="form-group form-inline  row">
                                <label class="col-5">Codigo ISBN</label>
                                <input class="form-control col-6" type="text" name="codisbn" value="<?php echo $resp['codisbn'] ?>" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required readonly>
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5">Codigo Ejemplar</label>
                                <input class="form-control col-6" type="text" name="codejem" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required>
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5">Nombre</label>
                                <input class="form-control col-6" value="<?php echo $resp['nombre']; ?>" type="text" id="nomlib_ejem" name="nomlib" required readonly>
                            </div>
                            <div class="form-group form-inline  row">
                                <label class="col-5">Categoria</label>
                                <select class="form-control col-6" id="nomcat" name="nomcat" readonly>
                                    <option value="<?php echo $resp['codcateg']; ?>"> <?php echo $resp['nomcat']; ?></option>
                                </select>
                            </div>
                            <div>
                                <input type="hidden" name="controlador" value="LibroControlador">
                                <input type="hidden" name="accion" value="agregarLibro">
                                <input type="hidden" name="vista" value="crearLibroVista">
                                <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                                <input type="hidden" name="vistaMenuS" value="menuLibro">
                            </div>
                        </div>
                        <div class="card-footer text-center ">
                            <input class="btn btn-success " type="submit" name="agregar_ejem" value="Agregar">
                        </div>
                    <?php
                            }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class='alert border-primary alert-info alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 12rem; left: 55rem;">
        Instrucciones para agregar un libro exitosamente. <br>
        <blockquote class="text-left ml-3">
            1. Registrar Libro:<br>
            &nbsp;&nbsp;&nbsp; a) Llene los campos del segundo recuadro para crear un &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;libro <br>
            &nbsp;&nbsp;&nbsp; b) Presione el boton de agregar para registrar el libro <br>
            2. Registrar Ejemplar:<br>
            &nbsp;&nbsp;&nbsp; a) Digite el codigo ISBN para Verificar si este codigo ya se &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;encuentra registrado. <br>
            &nbsp;&nbsp;&nbsp; b) Si el libro existe, se cargaran los datos del libro. <br>
            &nbsp;&nbsp;&nbsp; c) Digite el codigo de ejemplar para crear un nuevo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ejemplar del libro. <br>
            &nbsp;&nbsp;&nbsp; d) Presione el boton de agregar para registrar el ejemplar <br>
        </blockquote>
    </div>
</body>

</html>
<?php

if (!is_array($resp)) {
    if ($resp) {
?>
        <div class='alert alert-success alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
            Libro agregado exitosamente. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>


    <?php
    } else {

    ?>
        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
            Error, Codigo ISBN no existe o codigo de ejemplar ya existe <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>


<?php
    }
}


?>
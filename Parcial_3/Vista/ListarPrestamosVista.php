<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}

?>
<div class="cuadros card  shadow  p-0 " style=" width: 30rem; position: relative; margin: 3% 30% ">
    <div class="card-text text-center">
        <div class="card-header text-center">
            <div class="card-title ">
                <h5><b>Listar Libros</b></h5>
            </div>
        </div>
        <div class="card-text text-center p-3 pl-5">
            <div class="card-text ">
                <form method="post" action="index.php">
                    <div class="form-group form-inline  row"><br><br><br>
                        <label class="col-5">Opciones</label>
                        <select class="form-control col-6" required id="opc" name="opc" required>
                            <option value="">Seleccione</option>
                            <option value="1">Prestados</option>
                            <option value="2">Disponibles</option>
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="controlador" value="PrestamoControlador">
                        <input type="hidden" name="accion" value="ejemplarPrestado">
                        <input type="hidden" name="vista" value="ListarPrestamosVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                    </div>
                    <div class="card-text text-center">
                        <input class="btn btn-primary" type="Submit" name="listarLib" value="Listar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?PHP
if (isset($resp)) {
    if (empty($resp)) {
?>

        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
            No hay Prestamos Registrados. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>
        <?php
    } else {
        if ($resp[0][3] == null) {
        ?>

            <div class="cuadros card  shadow " style="width: 50rem; position:relative;  margin-top:70% ; right: 105%;">
                <div class="card-title text-center m-3">
                    <h5><b>Libros Disponibles</b></h5>
                </div>
                <div class="table-responsive " style="height: 10rem">
                    <table class="table table-sm text-center">
                        <thead class="table-dark ">
                            <tr>
                                <th>Nombre</th>
                                <th>Codigo ISBN</th>
                                <th>Codigo Ejemplar</th>
                            </tr>
                        </thead>
                        <?php for ($i = 0; $i < count($resp); $i++) { ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $resp[$i][1] ?></td>
                                    <td><?php echo $resp[$i][0] ?></td>
                                    <td><?php echo $resp[$i][2] ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="cuadros card  shadow " style="width: 50rem; position:relative;  margin-top:70% ; right: 105%;">
                <div class="card-title text-center m-3">
                    <h5><b>Libros Prestados</b></h5>
                </div>
                <div class="table-responsive " style="height: 10rem">
                    <table class="table table-sm text-center">
                        <thead class="table-dark ">
                            <tr>
                                <th>Nombre Libro</th>
                                <th>Codigo ISBN</th>
                                <th>Codigo Ejemplar</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Tipo Usuario</th>
                            </tr>
                        </thead>
                        <?php for ($i = 0; $i < count($resp); $i++) { ?>
                            <html>
                            <form method="post" action="">
                                <tbody>
                                    <tr>
                                        <td><?php echo $resp[$i][1] ?></td>
                                        <td><?php echo $resp[$i][0] ?></td>
                                        <td><?php echo $resp[$i][2] ?></td>
                                        <td><?php echo $resp[$i][3] ?></td>
                                        <td><?php echo $resp[$i][4] ?></td>
                                        <td><?php echo $resp[$i][5] ?></td>
                                    </tr>
                                </tbody>
                            </form>

                            </html>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

<?php
        }
    }
}
?>
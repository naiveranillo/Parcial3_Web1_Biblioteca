<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
?>
<html>
<head>
<!-- <script type="text/javascript" src="js/datos.js"></script> -->
</head>
<body>
    <center>
        <div class="card shadow " style=" width: 30rem; position:relative; margin:5% 28%; ">
            <div class="card-header text-center">
                <div class="card-title ">
                    <h4><b>Estado de Usuarios</b></h4>
                </div>
            </div>
            <div class="card-text text-center">
                <div class="card-text">
                    <form method="post" action="index.php">
                        <input type="hidden" name="controlador" value="UsuarioControlador">
                        <input type="hidden" name="accion" value="listarUsuarioEstado">
                        <input type="hidden" name="vista" value="estadoUsuVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuUsu">
                        <div class="card-footer text-center ">
                            <!-- <label class="col-5">listar</label> -->
                            <center>
                                <select class="form-control col-6" id="estado" name="estado"  required>
                                    <option value="">Seleccione</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                    
                                </select>
                            </center><br>
                            <input class="btn btn-success " type="Submit" name="listar" value="Listar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>

</body>

</html>

<?PHP
if (isset($_POST['listar'])) {
    //echo var_dump($resp);
    if (empty($resp)) {
?>

        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 83%; left: 43%;">
            No hay Usuarios registrados. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>


    <?php
    } else {
    ?>


        <div class="cuadros card shadow  " style="width: 50rem; position:relative; margin:5% -10%;">
            <!-- <div class="card-title text-center m-3 ">
            <h4><b>Listado de Usuarios</b></h4>
        </div> -->
            <div class="table-responsive" style="height: 15rem" id="tabla">
                <table class="table  table-sm text-center">
                    <thead class="table-dark ">
                        <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Tipo Usuario</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <?php for ($i = 0; $i < count($resp); $i++) { ?>
                        <html>
                        <form method="post" action="">
                            <tbody>
                                <tr>
                                    <td><?php  echo $resp[$i][0]  ?></td>
                                    <td><?php  echo $resp[$i][1]  ?></td>
                                    <td><?php  echo $resp[$i][2]  ?></td>
                                    <td><?php  echo $resp[$i][3] ?></td>
                                    
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

?>
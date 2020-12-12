<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}

?>
    <div class="cuadros card  shadow  p-0 " style=" width: 30rem; position: relative; margin: 3% 30% " >
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
                                                <option value="1">Por Codigo ISBN</option>
                                                <option value="2">Por Categoria</option>
                                        </select>   
                        </div>
                        <div>
                            <input type="hidden" name="controlador" value="LibroControlador">
                            <input type="hidden" name="accion" value="tablaLibro">
                            <input type="hidden" name="vista" value="ListarLibroVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuLibro">
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
            No hay Libros Registrados. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>
    <?php
        }else{ 
    ?>  

            <div class="cuadros card  shadow " style="width: 50rem; position:relative;  margin-top:70% ; right: 105%;">
                <div class="card-title text-center m-3">
                    <h4><b>Listado de Libros</b></h4>
                </div>
                <div class="table-responsive " style="height: 10rem">
                    <table class="table table-sm text-center">
                        <thead class="table-dark ">
                            <tr>
                                <th>Nombre</th>
                                <th>Codigo ISBN</th>
                                <th>Categoria</th>
                                <th>Libros Disponibles</th>
                            </tr>
                        </thead>
                        <?php for ($i = 0; $i < count($resp['nombre']); $i++) { ?>
                            <html>
                            <form method="post" action="">
                                <tbody>
                                    <tr>
                                        <td><?php echo $resp['nombre'][$i] ?></td>
                                        <td><?php echo $resp['codisbn'][$i] ?></td>
                                        <td><?php echo $resp['codcateg'][$i] ?></td>
                                        <td><?php echo $resp['cantidad'][$i] ?></td>
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
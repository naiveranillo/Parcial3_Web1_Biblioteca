<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
/*  var_dump($resp); */
?>
<html>

<body><!-- position: relative; margin: 0% -35% -->

    <div class="cuadros card  shadow  p-0 " style=" width: 30rem; position: relative; margin: 5% 30% " >
        <div class="card-text text-center">
            <div class="card-header text-center">
                <div class="card-title ">
                    <h5><b>Eliminar Categoria</b></h5>
                </div>
            </div>
            <div class="card-text text-center p-3 pl-5">
                <div class="card-text ">
                    <form method="post" action="index.php">
                        <div class="card-text">
                            <div class="form-group form-inline  row"><br><br><br>
                                    <label class="col-5">Categorias</label>
                                        <select class="form-control col-6" required id="datocat" name="datocat">
                                                <option value="">Seleccione</option>
                                                    <?php 
                                                        if (is_array($resp)) {
                                                            $_SESSION['nomcat'] = $resp['nombre'];
                                                            $_SESSION['codcat'] = $resp['cod'];

                                                        } 
                                                        if (isset($_SESSION['nomcat'])) {
                                                            for ($i=0; $i < count($_SESSION['nomcat']); $i++) { 
                                    
                                                                echo '<option value="'.$_SESSION['codcat'][$i].'">'.$_SESSION['codcat'][$i].''." - ".''.$_SESSION['nomcat'][$i].'</option>';
                                                            }
                                                        }  
                                                    ?>

                                            </select>   
                        </div>
                        <div>
                            <input type="hidden" name="controlador" value="CategoriaControlador">
                            <input type="hidden" name="accion" value="EliminarCateg">
                            <input type="hidden" name="vista" value="eliminarCategVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuLibro">
                        </div>
                        <div class="card-text text-center">
                            <input class="btn btn-danger" type="Submit" name="elimCat" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
<?php 
    if(isset($resp) AND !is_array($resp)){
        if($resp){
            ?>
                        <div class='alert alert-success alert-dismissible fade show text-center' 
                            role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 140%; left: 1%;">
                                    Categoria Eliminada. <br>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                                Ok
                            </button>
                        </div>

                
            <?php
        }else{
            ?>
                <div class='alert alert-warning p-1 alert-dismissible fade show text-left' 
                        role='alert' style="padding:1% 0%;width: 20rem; position: absolute; top: 140%; left: 18.5%;"><center>Categoria no Eliminada.</center>
                        <center>La categoria tiene libros asignados.</center>

                    <div class="card-text text-center">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                        Ok
                    </button></div>
                </div>
            <?php
  }
}
?>
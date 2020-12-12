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
                    <h5><b>Crear Categoria</b></h5>
                </div>
            </div>
            <div class="card-text text-center p-3 pl-5">
                <div class="card-text ">
                    <form method="post" action="index.php">
                        <div class="card-text">
                            <div class="form-group form-inline  row">
                                    <label class="col-5">Codigo Categoria</label>
                                    <input class="form-control col-6" 
                                            type="text" id="codcateg" name="codcateg"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" required>
                            </div>
                            <div class="form-group form-inline  row">
                                    <label class="col-5">Nombre</label>
                                    <input class="form-control col-6" 
                                            type="text" id="nomcateg" placeholder="Ejem: Infantil" name="nomcateg" 
                                            required autocomplete="off">
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="controlador" value="CategoriaControlador">
                            <input type="hidden" name="accion" value="agregarCateg">
                            <input type="hidden" name="vista" value="crearCategoriaVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuLibro">
                        </div>
                        <div class="card-text text-center">
                            <input class="btn btn-success " type="Submit" name="aggCateg" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
<?php 
    if(isset($resp)){
        if($resp){
            ?>
                        <div class='alert alert-success alert-dismissible fade show text-center' 
                            role='alert' style="padding:1% 0%;width: 30rem; position: absolute; top: 60%; left: 43%;">
                                    Categoria agregado exitosamente. <br>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                                Ok
                            </button>
                        </div>

                
            <?php
        }else{
            ?>
                <div class='alert alert-warning p-1 alert-dismissible fade show text-left' 
                        role='alert' style="padding:1% 0%;width: 15rem; position: absolute; top: 60%; left: 51.5%;">
                        <center>Puede haber ocurrido algo:</center><br>

                        - Categoria no Agregada <br>
                        - Este Codigo ya existe.<br>

                    <div class="card-text text-center">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                        Ok
                    </button></div>
                </div>
            <?php
  }
}
?>
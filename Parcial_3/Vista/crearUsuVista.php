<?php
/* if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
} */
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="navbar navbar-expand-lg text-white ">
            <h1><b>GrootLibrary</b></h1>
            <form action="index.php" method="post">
                <input class="btn btn-success " type="submit" name="inicio" value="iniciar Sesion"
                    style="position: relative; left: 60rem;"> 
            </form>
        </div><center>
            <div class="cuadros card shadow " style=" width: 30rem; position:relative; margin:4% 28%; 
                     background-color: rgba(255, 255, 255, 0.884);  ">
                <div class="card-header text-center">
                    <div class="card-title ">
                        <h4><b>Registrar Usuario</b></h4>
                    </div>
                </div>
        
                <div class="card-text text-center mt-3">
                    <div class="card-text">
                        <form action="index.php" method="post">
                            <div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Nombre Completo</label>
                                    <input class="form-control col-6" type="text" id="nombre" name="nombre" 
                                            required autocomplete="off"></>
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Cedula</label>
                                    <input class="form-control col-6" type="number" id="cedula" name="cedula" 
                                            required autocomplete="off">
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Fecha Nacimiento</label>
                                    <input class="form-control col-6" type="date" id="fecha" name="fecha" 
                                            required autocomplete="off">
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Sexo</label>
                                    <select class="form-control col-6" id="sexo" name="sexo" required>
                                            <option value="">Seleccione</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Tipo Usuario</label>
                                    <select class="form-control col-6" id="tipoUsu" name="tipoUsu" required>
                                            <option value="">Seleccione</option>
                                            <option value="Profesor">Profesor</option>
                                            <option value="Estudiante">Estudiante</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="hidden" name="controlador" value="UsuarioControlador">
                                    <input type="hidden" name="accion" value="agregarUsu">
                                    <input type="hidden" name="vista" value="crearUsuVista">
                                    <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                                    <input type="hidden" name="vistaMenuS" value="menuUsu">
                                </div>
                            </div>
                            <div class="card-footer text-center ">
                                <input class="btn btn-success " type="submit" name="agregar" value="Agregar">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            </center>
    </body>
</html>
<?php 
    if(isset($resp)){
        if($resp==true){
            ?>      
                        <div class='alert alert-success alert-dismissible fade show text-center' 
                            role='alert' style="padding:1% 0%;width: 30rem; position: absolute;left: 28rem; top: 34rem;">
                                    Usuario agregado exitosamente. <br>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                                Ok
                            </button>
                        </div>
                    
                
            <?php
        }else{
            ?>  
                    <div class='alert alert-warning alert-dismissible fade show text-center' 
                        role='alert' style="padding:1% 0%;width: 30rem; position: absolute;left: 28rem; top: 34rem; ">
                            Esta identificacion ya se encuentra registrada en el sistema. <br>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                            Ok
                        </button>
                    </div>
                
            <?php
        }
    }
    
?>
<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
    
}
    $user = "";
    $nombre = "";
    $contra = "";
    $correo = "";
    if(isset($_POST['buscar'])){
        if($resp==null){
            ?>
                <div class='alert alert-warning alert-dismissible fade show text-center' 
                        role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                            Nombre de usuario no encontrado, por favor digite un nombre de usuario valido. <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                         Ok
                    </button>
                </div>
            <?php
        }else{
            
                $cedula = $resp->getCedula();
                $nombre = $resp->getNombre();
                $sexo = $resp->getSexo();
                $tipo = $resp->getTipoUsuario();
                $estado = $resp->getEstado();
                $fecha = $resp->getFechaNaci();
?>
            <div class="cuadros card  shadow " style=" width: 25rem; position:absolute; margin:1.6% 25%;">
                <div class="card-header text-center">
                    <div class="card-title ">
                        <h5><b>Datos a modificar</b></h5>
                    </div>        
                </div>
                <div class="card-text text-center">
                    <div class="card-text">                        
                        <form method="post" action="index.php"> 
                            <div class="card-body">
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Cedula</label>
                                    <input class="form-control col-6" type="number" id="cedula" name="cedula"
                                            value="<?php echo $cedula?>" 
                                            readonly autocomplete="off">
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Nombre Completo</label>
                                    <input class="form-control col-6" type="text" id="nombre" name="nombre" 
                                    value="<?php echo $nombre?>" 
                                            required autocomplete="off"></>
                                </div>
                                
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Fecha Nacimiento</label>
                                    <input class="form-control col-6" type="date" id="fecha" name="fecha" 
                                    value="<?php echo $fecha?>" 
                                            required autocomplete="off">
                                </div>
                                <!-- <div class="form-group form-inline  row">
                                    <label class="col-5">Estado</label>
                                    <select class="form-control col-6" id="sexo" name="sexo" required>
                                        <option value="">Seleccione</option>
                                        <?php if($estado=='activo'){?>
                                            <option selected value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        <?php }else{?> 
                                            <option value="activo">Activo</option>
                                            <option selected value="inactivo">Inactivo</option>
                                        <?php }?>
                                    </select>
                                </div> -->
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Sexo</label>
                                    <select class="form-control col-6" id="sexo" name="sexo" required  > 
                                            <option value="">Seleccione</option>
                                        <?php if($sexo=='Masculino'){?>
                                            <option selected value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        <?php }else{?> 
                                            <option value="Masculino">Masculino</option>
                                            <option selected value="Femenino">Femenino</option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group form-inline  row">
                                    <label class="col-5">Tipo Usuario</label>
                                    <select class="form-control col-6" id="tipoUsu" name="tipoUsu" required >
                                            <option value="">Seleccione</option>
                                        <?php if($tipo=='Profesor'){?>
                                            <option selected value="Profesor">Profesor</option>
                                            <option value="Estudiante">Estudiante</option>
                                        <?php }else{?>
                                            <option value="Profesor">Profesor</option>
                                            <option selected value="Estudiante">Estudiante</option>
                                        <?php }?>
                                    </select>
                                </div>
                                
                            </div>
                            <input type="hidden" name="controlador" value="UsuarioControlador">
                            <input type="hidden" name="accion" value="modificarUsuario">
                            <input type="hidden" name="vista" value="modificarUsuVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuUsu">
                            <div class="card-footer text-center ">
                                <input class="btn btn-success " type="Submit" name="modificar" value="Modificar">
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
<html>   
	<body>
            <div class="cuadros card shadow " style=" width: 25rem; position:relative; margin:5% -30%; ">
                <div class="card-header text-center">
                    <div class="card-title ">
                        <h5><b>Modificar Usuario</b></h5>
                    </div>        
                </div>
                <div class="card-text text-center">
                    <div class="card-text">                        
                        <form method="post" action="index.php"> 
                            <div class="card-body">
                                <div class="form-group form-inline  row">
                                    <label class="col-4"><b>Cedula:</b></label>                  
                                    <input class="form-control col-6"  type="number" name="cedula" required autocomplete="off"><br>      
                                </div> 
                            </div>
                            <input type="hidden" name="controlador" value="UsuarioControlador">
                            <input type="hidden" name="accion" value="buscarUsuario">
                            <input type="hidden" name="vista" value="modificarUsuVista">
                            <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                            <input type="hidden" name="vistaMenuS" value="menuUsu">
                            <div class="card-footer text-center ">
                                <input class="btn btn-success " type="Submit" name="buscar" value="buscar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
	</body>
</html>
		
<?PHP
if(isset($_POST['modificar'])){

    if($resp==false){
?>              <div class='alert alert-warning alert-dismissible fade show text-center' 
                    role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                        No se pudo hacer la actualizacion de los datos por favor intentelo de nuevo. <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                    Ok
                    </button>
                </div>
<?php
    }else{
?>
        <div class='alert alert-success alert-dismissible fade show text-center' 
                    role='alert' style="padding:1% 0%;width: 25rem; position: absolute; top: 60%; left: 24%;">
                        Datos Actualizados exitosamente <br>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                    Ok
                    </button>
                </div>
<?php
    }
} 
?>
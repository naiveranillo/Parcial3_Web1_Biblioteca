<!DOCTYPE html>
<html lang="en">

<body>
    <!-- style="background-color: rgb(0, 154, 255,0.5)" -->
    <div class="navbar navbar-expand-lg text-white ">
        <h1><b>GrootLibrary</b></h1>
        <form action="index.php" method="post">
            <input class="btn btn-success " type="submit" name="registrar" value="Registrarse" 
            style="position: relative; left: 60rem;">
        </form>
    </div><!-- position:absolute; left:55%; margin:5% 0%;  -->
    <center>
    <div class="card shadow " style=" width: 30rem;  margin:10% 0%; 
                background-color: rgba(255, 255, 255, 0.884);  ">
        <div class="card-header text-center">
            <div class="card-title ">
                <h4><b>Iniciar Sesion</b></h4>
            </div>
        </div>
        <div class="card-text text-center mt-3">
            <div class="card-text">
                <form action="index.php" method="post">
                    <div class="form-group form-inline  row">
                        <label class="col-4"><b>Usuario:</b></label>
                        <input class="form-control col-6" type="text" name="username" placeholder="Nombre Usuario" required autocomplete="off"><br>
                    </div>
                    <div class="form-group form-inline row">
                        <label class="col-4"><b>Cedula:</b></label>
                        <input class="form-control col-6" type="password" name="contrasena" placeholder="cedula" required autocomplete="off"><br>
                    </div>
                    <input type="hidden" name="controlador" value="LoginControlador">
                    <input type="hidden" name="accion" value="login">
                    <input type="hidden" name="vista" value="loginVista">
                    <div class="card-footer text-center ">
                        <input class="btn btn-success " type="submit" name="login" value="Ingresar">
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


    if (!$resp) {
?>
    <center>
        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' 
            style="padding:1% 0%;width: 30rem; top: -5rem;">
            Usuario o contrasenia incorrectos. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>
    </center>

<?php
    }
}else{
    if(isset($_POST['login'])){
    ?>
    <center>
        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert' 
                    style="padding:1% 0%;width: 30rem; top: -5rem;">
            Usuario o contrasenia incorrectos. <br>
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="alert" aria-label="Close">
                Ok
            </button>
        </div>
    </center>

<?php
}
}
?>
<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    
        <div class="navbar navbar-expand-lg text-white " >
            <h3 ><b>GrootLibrary</b></h3> 
            <div class="navbar-nav  mr-auto ml-auto mt-1">
                <!-- <a class="opc nav-item nav-link  text-center col-7"  href="index.php?indice=administrador&admin=crear"><h4><b>Registrar Usuarios</b></h4></a>
                <a class="opc nav-item nav-link  text-center col-7"  href="index.php?indice=administradoradmin=listar"><h4><b>Listar Usuarios</b></h4></a> -->
            </div>
            <div class="navbar-nav ">
                <h6 class="nav-item nav-link mr-2 text-center "><b>Bienvenido: <?php if(isset($_SESSION['persona']))echo $_SESSION['persona']['nombre'];?></br></h6>
            </div>
        </div>
        <div class="card-columns" >
            <div class="card m-0 p-0" style="width: 61%; height: 37.3rem" >
            
                <div class=" card-header m-0 p-0 text-center ">
                    <div class="perfil m-0 p-0 card ">
                    <center>
                        <img src="./css/icono-usuario.png" alt="" width="120px" height="120px">
                    </center></div>
                    <div class="card-group" >
                        <div class="card-text bg-primary text-center p-1" style="width: 10rem;"><?php if(isset($_SESSION['persona']))echo $_SESSION['persona']['nombre'];?></div>
                        <a class="card-text bg-danger text-center p-1" style="width: 6.5rem;" href="index.php?sesion=logout">Salir</a>
                    </div>
                </div>
                <div class="list-group list-group-flush" >
                    <a class="opc list-group-item" href="index.php?ind=inicio&indice=usuario">Gestionar Usuario</a>
                    <a class="opc list-group-item" href="index.php?ind=inicio&indice=libro">Gestionar Libros</a>
                    <a class="opc list-group-item" href="index.php?ind=inicio&indice=entrega">Gestionar Prestamos</a>
                    <div class="opc list-group-item "></div>
                </div>
            </div>
    
        
    



</html>
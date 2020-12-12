<?php
if (!isset($_SESSION['registro']) || $_SESSION['registro'] != 'ok') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
        

        <div class="card" style="width: 248%; position: relative; right: 12rem">
            <div class="card-text mr-auto ml-auto ">
                <div class="card-group ml-auto mr-auto" style="width: 103rem">
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=usuario&usu=estado"><h5><b>Estado de Usuario </b></h5></a>
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=usuario&usu=listar"><h5><b>Listar Usuario</b></h5></a> 
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=usuario&usu=modificar"><h5><b>Modificar Usuario</b></h5></a>
                </div>
                
            </div>
        </div>
         



</html>
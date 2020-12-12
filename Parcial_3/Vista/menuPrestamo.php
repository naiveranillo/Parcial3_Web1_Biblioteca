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
                <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=entrega&libro=prestar"><h5><b>Prestar Libro</b></h5></a>
                    <a class=" text-center col-2 p-2"  href="javascript:entregar();"><h5><b>Entregar Libro</b></h5></a>
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=entrega&libro=listar"><h5><b>Listar Prestamos</b></h5></a> 
                </div>
                <form method="post" action="index.php?ind=inicio&indice=entrega&libro=entregar" class="form-inline" name="entrega">
                    <input type="hidden" name="controlador" value="PrestamoControlador">
                    <input type="hidden" name="accion" value="listarUsuario">
                    <input type="hidden" name="vista" value="entregarLibroVista">
                    <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuPrestamo">
                </form>
                <script>
                    function entregar() {
                        document.entrega.submit();
                    }
                </script>
            </div>
        </div>
         



</html>
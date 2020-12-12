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
                    
                    
                    <a class=" text-center col-2 p-2"  href="javascript:enviarC();"><h5><b>Registrar Libro</b></h5></a>
                    <form method="post" action="index.php" class="form-inline" name="listaC">
                        <input type="hidden" name="controlador" value="CategoriaControlador">
                        <input type="hidden" name="accion" value="listarTodaCateg">
                        <input type="hidden" name="vista" value="crearLibroVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuLibro">
                    </form>
                    <form method="post" action="index.php?ind=inicio&indice=libro&lib=elicat" class="form-inline" name="listaC2">
                        <input type="hidden" name="controlador" value="CategoriaControlador">
                        <input type="hidden" name="accion" value="listarTodaCateg">
                        <input type="hidden" name="vista" value="eliminarCategVista">
                        <input type="hidden" name="vistaMenuP" value="menuPrincipal">
                        <input type="hidden" name="vistaMenuS" value="menuLibro">
                    </form>
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=libro&lib=crearcat"><h5><b>Crear Categoria</b></h5></a>
                    <a class=" text-center col-2 p-2"  href="javascript:enviarC2();"><h5><b>Eliminar Categoria</b></h5></a>
                    <a class=" text-center col-2 p-2"  href="index.php?ind=inicio&indice=libro&lib=listar"><h5><b>Listar Libros</b></h5></a>
                    <script>
                        function enviarC(){
                            document.listaC.submit();
                        }
                        function enviarC2(){
                            document.listaC2.submit();
                        }
                    </script>
                </div>
                
            </div>
        </div>
         



</html>
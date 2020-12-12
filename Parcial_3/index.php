<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GrootLibrary</title>
        <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet"  href="css/estilos2.css"> 
    </head>
    <body >
        <?php
            session_start();
            if(!isset($_SESSION['registro']) || $_SESSION['registro']!='ok'){
                if(isset($_POST['registrar'])){
                    require_once('Vista/crearUsuVista.php');
                }else if(isset($_POST['agregar'])){
                    $controlador =$_POST['controlador'];
                    $accion =$_POST['accion'];
                    $vista=$_POST['vista'];
                    if (file_exists("Controlador/{$controlador}.php")){
                            require_once("Controlador/{$controlador}.php");
                            $con = new $controlador();
                            $resp=$con->$accion($_POST);
                            require_once("Vista/{$vista}.php");
                    }else{
                            echo"no existe";
                    }
                    
                }else if(isset($_POST['inicio'])){
                    require_once('Vista/loginVista.php');
                }else if(isset($_POST['login'])){
                    $controlador =$_POST['controlador'];
                    $accion =$_POST['accion'];
                    $vista=$_POST['vista'];
                    if (file_exists("Controlador/{$controlador}.php")){
                            require_once("Controlador/{$controlador}.php");
                            $con = new $controlador();
                            $resp=$con->$accion($_POST);
                            require_once("Vista/{$vista}.php");
                    }else{
                            echo"no existe";
                    } 
                }else{
                    require_once('Vista/loginVista.php');
                }
                
            }else{
                if ($_POST) {
                    $controlador = $_POST['controlador'];
                    $accion = $_POST['accion'];
                    $vista = $_POST['vista'];
                    $vistaMenuS = $_POST['vistaMenuS'];
                    $vistaMenuP = $_POST['vistaMenuP'];
                    if (file_exists("Controlador/{$controlador}.php")) {
                        require_once("Controlador/{$controlador}.php");
                        $con = new $controlador();
                        $resp = $con->$accion($_POST);
                        require_once("Vista/{$vistaMenuP}.php");
                        require_once("Vista/{$vistaMenuS}.php");
                        require_once("Vista/{$vista}.php");
                    } else {
                        echo "no existe";
                    }
                } else {
                    if (isset($_GET['ind'])) {
                        if ($_GET['ind'] == 'inicio') {
                            include('Vista/menuPrincipal.php');
                            if(isset($_GET['indice'])){
                                if($_GET['indice']=='usuario'){
                                    include('Vista/menuUsu.php');
                                    if (isset($_GET['usu'])) {
                                        if ($_GET['usu'] == 'estado') {
                                            include('Vista/estadoUsuVista.php');
                                        }
                                        if ($_GET['usu'] == 'listar') {
                                            include('Vista/listarUsuVista.php');
                                        }
                                        if ($_GET['usu'] == 'modificar') {
                                            include('Vista/modificarUsuVista.php');
                                        }
                                        if ($_GET['usu'] == 'eliminar') {
                                            include('Vista/eliminarUsuVista.php');
                                        }
                                    }
                                }
                                if($_GET['indice']=='libro'){
                                    include('Vista/menuLibro.php');
                                    if (isset($_GET['lib'])) {
                                        if ($_GET['lib'] == 'crear') {
                                            include('Vista/crearLibroVista.php');
                                        }
                                        if ($_GET['lib'] == 'crearcat') {
                                            include('Vista/crearCategoriaVista.php');
                                        }
                                        if ($_GET['lib'] == 'elicat') {
                                            include('Vista/eliminarCategVista.php');
                                        }
                                        if ($_GET['lib'] == 'listar') {
                                            include('Vista/listarLibroVista.php');
                                        }
                                    }
                                }
                                
                                if($_GET['indice']=='entrega'){
                                    include('Vista/menuPrestamo.php');
                                    if (isset($_GET['libro'])) {
                                        if ($_GET['libro'] == 'entregar') {
                                            include('Vista/entregarLibroVista.php');
                                        }
                                        if ($_GET['libro'] == 'listar') {
                                            include('Vista/listarPrestamosVista.php');
                                        }
                                        if ($_GET['libro'] == 'prestar') {
                                            include('Vista/prestarLibroVista.php');
                                        }
                                    }
                                }
                            }
                            
                        }
                    } 
                }
            }
            if(isset($_GET['sesion'])){
                session_destroy();
                header('Location: index.php');
            }

        ?>
        <img class="fondo" src="" alt="">
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>
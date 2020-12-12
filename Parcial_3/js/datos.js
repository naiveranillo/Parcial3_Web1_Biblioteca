

function usuario(str) {

    var cedula=str;
    var xmlhttp;
    var libroRecibidas = new Array();
    var nodoMostrarResultados = document.getElementById('libro');
    var contenidosAMostrar = '';

    
    xmlhttp=new XMLHttpRequest();
    
    
    xmlhttp.onreadystatechange = function() {//Esta funcion se ejecuta cuando el servidor responde
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {//se recibio la info del servidor y la respuesta es correcta
        libroRecibidas = xmlhttp.responseText.split(",");//Convierto la cadena en una array
        console.log(libroRecibidas);
        
        for (var i=1; i<libroRecibidas.length;i=i+2) {//Recorro el arreglo
            /* var indice='';
            var nombre='';*/
            contenidosAMostrar += '<option value="' + libroRecibidas[i] + '" >' + libroRecibidas[i+1] + '</option>';

            
        }
            nodoMostrarResultados.innerHTML = contenidosAMostrar;//Inserto el codigo html
        }
    }
    
    
    var cadenaParametros = 'cedula='+encodeURIComponent(cedula);
    xmlhttp.open('POST', 'js/datos.php'); // Método post y url invocada
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // Establecer cabeceras de petición
    xmlhttp.send(cadenaParametros); // Envio de parámetros usando POST
}


















/* $(document).ready(function(){


    

    function usuarios(){
        $.ajax({
            url: "js/datos.php",
            method: "post",
            data:  "tipo="+$('#tipoUsu').val(),
            success: function(r){
                $('#tabla').html(r)
                console.log(r);
            }
        })
    }

    $('#tipoUsu').change(function(){
        usuarios();
        console.log(usuarios());
    })
}); */
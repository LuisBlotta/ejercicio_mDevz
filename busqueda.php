<!--<html>
<body>
<form action="controlador/busqueda_tweet.php" method="post">
    <label for="">buscar</label>
    <input type="text" name="valorPalabraClave">
    <button>enviar</button>

</form>
</body>
</html> -->
<?php
?>



<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script>
        function validar() {
            if ($('#palabraClave').val().length == 0) {
                return false;
            }
        }
        function realizaProceso(valorPalabraClave){
            if(validar() == false){
                document.getElementById('aviso').innerHTML='Ingrese una palabra';}
            else{
                document.getElementById('aviso').innerHTML='';

            var parametros = {
                "valorPalabraClave" : valorPalabraClave,

            };
            $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'controlador/busqueda_tweet.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultado").html(response);
                }
            }); }
        }
    </script>

    <script>
        window.onload=function(){
            var parametros = {
                "valorPalabraClaveDefault" : "programacion",

            };

            $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'controlador/busqueda_tweet.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultado").html(response);
                }
            });
        }
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"  href="busqueda.php">Búsqueda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
   <a class="nav-link" href="controlador/historial.php">Historial</a>

        </ul>
    </div>
</nav>
<h1><span id="titulo">Search on</span><img class="twitter" src="assets/img/Twitter_Logo_Blue.png" alt=""></h1>

<div id="aviso" style="text-align: center; color: red"></div>

<section class="container">
    <form onsubmit="realizaProceso($('#palabraClave').val());return false;">
         <article class="flex-container" >

        <div class="buscador"><input class="input-group-text"type="text" name="caja_texto" id="palabraClave" required placeholder="Palabra clave" ></div>
        <div> <button class="btn btn-info" id="botonEnviar">Buscar</button> </div>


    </article>
    </form>
    <br>

 <span id="resultado"></span>
</section>

</body>
</html>
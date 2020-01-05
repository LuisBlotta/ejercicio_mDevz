<?php
require '../clases/Conexion.php';
function consultar(){
ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL_API", "https://api.twitter.com/1.1/search/tweets.json");
define("COUNT", "&count=8");
define("OP_CANT", "?q=");
define("LANG", "&lang=es");

    //  $busqueda = $_POST['busqueda'];
if (!empty($_POST['valorPalabraClaveDefault'])) {
    $busqueda = $_POST['valorPalabraClaveDefault'];
}elseif(!empty($_POST['valorPalabraClave'])){
    $busquedaSinFiltrar = $_POST['valorPalabraClave'];
    $busquedaSinFiltrar2 = str_replace(" ", "_", $busquedaSinFiltrar);
    $busqueda = str_replace("<", "%", $busquedaSinFiltrar2);
}else{

header("location:../vista/resultado_busqueda.php?vacio=true");

}
$authorization = "Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAARCBAEAAAAAITZ%2FJsmNHXxKCwx3efP2O3%2B%2FgOY%3DPBL7EMBOR3ry2VpLNfoRBXuImtTYQNJ3ow3T25VtI4CSf2uTRu";


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL_API.OP_CANT.$busqueda.COUNT.LANG);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

$result = curl_exec($ch);
$info = curl_getinfo($ch);

    if ($info["http_code"] == 200) {
        $data = json_decode($result, true);// con true es array, sin true es objeto

         // var_dump($data);
         //exit();

        loguear("../logs/request_info.log", "a+", "Ejecutando request GET a ".URL_API.OP_CANT.$busqueda.COUNT.LANG);
         loguear("../logs/request_info.log", "a+", "Request header: ".$info["request_header"]);
         loguear("../logs/request_info.log", "a+", "Response status code: ".$info["http_code"]);

        persistirBusqueda();
        return $data;

    }
    else {
        loguear("l../ogs/request_error.log", "a+", "Ejecutando request GET a ".URL_API.OP_CANT.$busqueda.COUNT.LANG);
        loguear("../logs/request_error.log", "a+", "Request header: ".$info["request_header"]);
        loguear("../logs/request_error.log", "a+", "Response status code: ".$info["http_code"]);
        return false;
    }

print_r($data);
exit();

curl_close($ch);


}

function persistirBusqueda(){


    if (!empty($_POST['valorPalabraClaveDefault'])) {

    }else{
        $busqueda = $_POST['valorPalabraClave'];

        //Establecemos zona horaria por defecto
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $fecha = new DateTime();
        $ahora = $fecha->format('Y-m-d H:i:s');

        //echo $ahora;
        //exit();

        $conn = Conexion::conectar();



        $sql ="insert into historial (busqueda, fecha) values ('$busqueda', '$ahora')";
        $stmt = $conn->prepare($sql);
        $stmt-> execute();
    }


}

function loguear($archivo, $modo, $mensaje) {

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $fecha = new DateTime();
    $ahora = $fecha->format('Y-m-d H:i:s');

    $fp = fopen($archivo, $modo);
    fwrite($fp, "[".$ahora."]\t".$mensaje.PHP_EOL);
    fclose($fp);

}

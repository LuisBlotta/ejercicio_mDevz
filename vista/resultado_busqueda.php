<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">

</head>
<?php
if (isset($_GET["vacio"]) && $_GET["vacio"] == 'true') {
    echo "<div style='color:red'>Complete el campo</div>";
    die();
}
if (isset($_GET["sinResultado"]) && $_GET["sinResultado"] == 'true') {
echo "<div style='color:red'>No hay resultados</div>";
die();
}
?>

<body>
<?php


for ($i=0; $i<count($tweets['username']); $i++) { ?>
<div class='card'>

<div class='card-body'>

  <div class="datos_tweet" id="img_user"><img class="img_user" src="<?=$tweets['foto'][$i]?>" alt="user_img" ></div>
  <div class="agrupador" >
      <div class="datos_tweet" id="username"><b><?=$tweets['username'][$i]?></b></div>
    <div class="datos_tweet" id="screen_name">  <p>@<?=$tweets['screen_name'][$i]?></p> </div>
  </div>

        <div class="datos_tweet" id="text"> <p>Tweet:  <?=$tweets['text'][$i]?></p></div>



</div></div>

    <?php
}



?>
</body>
</html>





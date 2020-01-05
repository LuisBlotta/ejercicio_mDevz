<?php
include('random_user.php');

$data = consultar();

$tweets = array();
?>
<!--<img src="<?=$tweets['username'][0] = $data['statuses'][0]['user']['profile_image_url_https'] ?> " alt="Img"> -->
<?php


if (!empty($data['statuses'])){
for ($i=0; $i<count($data['statuses']); $i++) {


    $tweets['username'][$i] = $data['statuses'][$i]['user']['name'];
    $tweets['screen_name'][$i] = $data['statuses'][$i]['user']['screen_name'];
    $tweets['text'][$i] = $data['statuses'][$i]['text'];
    $tweets['foto'][$i] = random_user();
}
}else{
header("location:../vista/resultado_busqueda.php?sinResultado=true");
}

?>

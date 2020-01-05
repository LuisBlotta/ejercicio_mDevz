<?php
$conn = Conexion::conectar();

$sql ="select * from historial";
$stmt = $conn->prepare($sql);
$stmt-> execute();
$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);


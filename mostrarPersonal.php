

<?php

include('CRUD/conexion.php');
$consulta = "select * from departamento";
$ejecucion = sqlsrv_query($conexion,$consulta );

$datos= sqlsrv_fetch_array($ejecucion);

var_dump($datos);



?>
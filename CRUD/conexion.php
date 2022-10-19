<?php

$serverName = "PCCARLA"; // cambian segun el nombre que se les puso en el SQL server


$conexionInfo = array("Database"=>"miTeleferico","TrustServerCertificate"=>"false","UID"=>"abcd","PWD"=>"1234");

$conexion = sqlsrv_connect($serverName,$conexionInfo);


if($conexion){
    echo "se conecto ";
    $consulta = "select * from departamento";
    $ejecucion = sqlsrv_query($conexion,$consulta );

    $datos= sqlsrv_fetch_array($ejecucion);

    var_dump($datos);
    
}else{
    echo "NO SE CONECTO :(";
    die(print_r(sqlsrv_errors(),true));
}
?>
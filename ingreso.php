<?php


require("CRUD/conexion.php");
    $conexion=conexion();
    $usuario = $_REQUEST['usuario'];
    $password = $_REQUEST['password'];
    $consulta = "SELECT nombre_usuario from usuario WHERE nombre_usuario LIKE '$usuario' AND passwordd LIKE '$password'";
    $resultadosql = mysqli_query($conexion,$consulta);
    $ingresos="no";
    $filas = $resultadosql->num_rows;
    if ($filas>0) {
        $ingresos="si";
        $resultado = mysqli_fetch_array($resultadosql);
        $json = json_encode($resultado);
        $datos = json_decode($json);
        //header("Location: Menu.html");
        session_start();
	    $_SESSION['ingreso']='si';
        foreach ( $datos as $iter){
            $_SESSION['usuario']=$iter;
        }
        header("Location: Menu.php");
    }else{
        echo "
            <script>
            alert('ALGO SALIO MAL');
            window.location = 'Login.php';
            </script>";
    }
    $conexion->close();

?>
<?php
require("CRUD/conexion.php");
$conexion=conexion();
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];
$correo = $_REQUEST['correo'];
$celular = $_REQUEST['celular'];
$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
$consulta = "SELECT nombre_usuario from usuario WHERE nombre_usuario LIKE '$usuario'";
$resultadosql = mysqli_query($conexion,$consulta);
$filas = $resultadosql->num_rows;

if ($filas > 0) {
    echo "
          <script>
          alert('EL USUARIO YA EXISTE :(');
          window.location = 'RegistrarCliente.php';
          </script>
          ";
} else {
    $sqlRegistrar = "INSERT INTO usuario(nombre_usuario, nombres, apellido_pat, apellido_mat, telefono, correo, passwordd, estado) 
    VALUES ('$usuario', '$nombre', '$paterno', '$materno', '$celular', '$correo', '$password', 'Activo');";

    $EnviarRegistro = mysqli_query($conexion,$sqlRegistrar);
    if ($EnviarRegistro) {
        echo "
      <script>
      alert('REGISTRO EXITOSO :)');
      window.location = 'Login.php';
      </script>";
    } else {
        echo "
      <script>
      alert('ALGO SALIO MAL D:');
      window.location = 'RegistrarCliente.php';
      </script>";
    }
}
$conexion->close();
?>

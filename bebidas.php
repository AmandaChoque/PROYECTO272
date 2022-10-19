<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0" />
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <!-- Mis estilos CSS -->
  <link rel="stylesheet" href="css/Stilos.css" />
  <title>RESTAURANTE</title>
</head>

<body>
  <a href="carrito.php" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>
  <header class="header">
    <h1 class="titulo text-center my-3">
      GUSTEAU'S<br /><span>RESTAURANTE</span>
    </h1>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-principal" aria-label="NavegacionPrincipal">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="nav-principal" class="collapse navbar-collapse">
        <nav class="navegacion-principal nav justify-content-between container flex-column flex-lg-row text-center">
          <a href="index.php" class="nav-link">Inicio</a>
          <a href="Menu.php" class="nav-link">Menu</a>
          <a href="QuieneSomos.php" class="nav-link">¿Quienes Somos?</a>
          <a href="Contacto.php" class="nav-link">Contacto</a>
          <a href="PreguntasFrecuentes.php" class="nav-link">Preguntas Frecuentes</a>
          <a href="Login.php" class="nav-link">Login</a>
        </nav>
      </div>
    </nav>
  </header>
  <section>
    <div class="imagen-principal imagen-bg container-fluid">
      <p>BEBIDAS</p>
    </div>
    <br />
    <div class="container productos mt-4">
      <h2 class="text-center">REFRESCATE CON NUESTRAS BEBIDAS</h2>
      <div class="row mt-4 justify-content-center">
        <?php
          include('CRUD/conexion.php');
          $conexion = conexion();
          $consulta = "SELECT * FROM producto p, bebida b WHERE p.id_producto = b.id_bebida;";
          $resultadosql = mysqli_query($conexion,$consulta);
          while($fila = mysqli_fetch_array($resultadosql)){
        ?>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
              <img src="img/<?php echo $fila['imagen']?>" class="img-fluid img-productos" />
              <div class="info-producto bg-primary text-center text-light">
                <h3 class="text-center mb-2"><?php echo $fila['nombre_producto']?></h3>
                <p class="recio font-weight-bold"><?php echo $fila['precio']?> Bs</p>
                <a href="" class="btn btn-success mb-2 btn-lg text-uppercase font-weight-bold">Ver Detalles</a>
              </div>
            </div>
        <?php } 
        $conexion->close();
        ?>

        

      </div>
    </div>
  </section>
  <footer class="pie-pagina">
    <div class="grupo-1">
      <div class="box">
        <figure>
          <a href="#">
            <img src="img/chef.svg" alt="Logo de SLee Dw" />
          </a>
        </figure>
      </div>

      <div class="box">

      </div>
      <div class="box">
        <h2>SIGUENOS</h2>
        <div class="red-social">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-youtube"></a>
        </div>
      </div>
    </div>
    <div class="grupo-2">
      <small>&copy; 2022 <b>EQUIPO INF-281</b> - Todos los Derechos
        Reservados.</small>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
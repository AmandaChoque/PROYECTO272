<?php
include('CRUD/conexion.php');
if (isset($_GET['id'])) {
  $conexion = conexion();
  $consulta = "select * from producto p, almuerzo a where p.id_producto = a.id_almuerzo and a.id_almuerzo=" . $_GET['id'] or die($conexion->error);
  $resultadosql = mysqli_query($conexion, $consulta);
  if (mysqli_num_rows($resultadosql)) {
    $fila = mysqli_fetch_row($resultadosql);
  } else {
    header("Location:index.php");
  }
} else {
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0" />
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Mis estilos CSS -->
  <link rel="stylesheet" href="css/Stilos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>RESTAURANTE</title>
</head>

<body>
  <a href="carrito.php" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito"></span></a>
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

    <h2 class="mb-3 alinear titutlo display-4 ">DETALLES: <?php echo $fila[1]; ?></h2>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="img/<?php echo $fila[4];?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">INGREDIENTES</h2>
            <?php
            $consultaD = "select i.cantidad, d.nombre_ingrediente from ingrediente_producto i, ingrediente d where i.id_producto =" . $fila[0] . " and (i.id_ingrediente = d.id_ingrediente)" or die($conexion->error);
            $result = mysqli_query($conexion, $consultaD);
            while ($datos = mysqli_fetch_array($result)) {
            ?>
              <p><?php echo "- " . $datos['cantidad'] . " " . $datos['nombre_ingrediente'] ?></p>
            <?php
            }
            ?>
            <p><strong class="text-primary h4"><?php echo $fila[2]; ?> Bs</strong></p>

            <div class="mb-1 d-flex">
              <h1>ELECCION</h1> <br>
            </div>
            <div class="mb-1 d-flex">
              <form action="" method="$_POST">
                  <input type="checkbox" id="detalle" checked="true"> Entrada (<?php echo $fila[7]; ?>) <br>
                  <input type="checkbox" id="detalle" checked="true"> Primer plato (<?php echo $fila[8]; ?>)  <br> <br>
                  <p>AGREGACION DE GUARNICIONES</p>
                  <input type="checkbox" id="detalle"> Papas Fritas <br>
                  <input type="checkbox" id="detalle"> Salsa Picante  <br>
                  <h2>PLATO PRINCIPAL: <?php echo $fila[9]; ?></h2>
              </form>
        
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary" onclick="restar()" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder="" id="cantidadDetalle" aria-label="Example text with button addon">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" onclick="sumar()" type="button">&plus;</button>
                </div>
              </div>

            </div>
            <p><a href="carrito.php?id=<?php echo $fila[0]?>" class="buy-now btn btn-sm btn-primary">agregar al carrito</a></p>

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid nosotros bg-primary">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="img/<?php echo $fila[4]; ?>" class="img-fluid img-productos" />
        </div>
        <div class="col-md-6 text-nosotros text-light">
          <div class="contenido">
            <p>ENTRADA: <?php echo $fila[7]; ?></p>
            <p>PRIMER PLATO (OPCIONAL): <?php echo $fila[8]; ?></p>
            <p>PLATO PRINCIPAL: <?php echo $fila[9]; ?></p>
            <h2 class="mb-3 titutlo display-4">INGREDIENTES</h2>

            <?php
            $consultaD = "select i.cantidad, d.nombre_ingrediente from ingrediente_producto i, ingrediente d where i.id_producto =" . $fila[0] . " and (i.id_ingrediente = d.id_ingrediente)" or die($conexion->error);
            $result = mysqli_query($conexion, $consultaD);
            while ($datos = mysqli_fetch_array($result)) {
            ?>
              <p><?php echo "- " . $datos['cantidad'] . " " . $datos['nombre_ingrediente'] ?></p>
            <?php
            }
            ?>
            <h2 class="mb-3 titutlo display-8">COSTO</h2>
            <p>
              <?php
              echo $fila[2];
              $conexion->close();
              ?> Bs
            </p>
          </div>
        </div>
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
  <script>
    function sumar(){
        var numero;
        numero =$('#cantidadDetalle').val();
        var resultado;
        resultado=parseInt(numero)+parseInt(1);
        $('#cantidadDetalle').val(resultado);
    }
    function restar(){
        var numero;
        numero =$('#cantidadDetalle').val();
        var resultado;
        if (parseInt(numero)-parseInt(1)>1){
          resultado=parseInt(numero)-parseInt(1);
        }else{
          resultado=1;
        }
        $('#cantidadDetalle').val(resultado);
    }
  </script>
  <script src="scripts/main.js"></script>
  <script src="scripts/jquery-3.3.1.min.js"></script>
  <script src="scripts/jquery-ui.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="scripts/owl.carousel.min.js"></script>
  <script src="scripts/jquery.magnific-popup.min.js"></script>
  <script src="scripts/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
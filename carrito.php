<?php
    session_start();
    include('CRUD/conexion.php');
    if(isset($_SESSION['carrito'])){
        //si existe el producto buscamos si ya estaba agregado el producto
        
        if(isset($_GET['id'])){
            //var_dump($_SESSION['carrito']);
            $arreglo = $_SESSION['carrito'];
            //var_dump($arreglo);
            $encontro = false;
            $num=0;
            $cantidad = count($arreglo);
            for ($i=0; $i < $cantidad;$i++){
                $Identificador = $arreglo[$i]["Id"];
                if($Identificador == $_GET['id']){
                    $encontro = true;
                    $num=$i;
                    break;
                }
            }
            //en caso de que haya otro producto
            if($encontro == true){
                $arreglo[$num]['Cantidad']=$arreglo[$num]['Cantidad']+1;
                $_SESSION['carrito']=$arreglo;
            }else{ 
                // no habia ese producto
                echo "pasa botassssaa";
                echo $_GET['id'];
                $nombre = "";
                $precio = "";
                $imagen = "";
                $conexion = conexion();
                $consulta = ("select * from producto where id_producto=".$_GET['id']) or die($conexion->error);
                $resultadosql = mysqli_query($conexion,$consulta);
                $fila = mysqli_fetch_row($resultadosql);

                $nombre= $fila[1];
                $precio= $fila[2];
                $imagen= $fila[4];
                $newarreglo = array(
                    'Id'=>$_GET['id'],
                    'Nombre'=>$nombre,
                    'Precio'=>$precio,
                    'Imagen'=>$imagen,
                    'Cantidad'=> 1
                );
                array_push($arreglo, $newarreglo);
                $_SESSION['carrito']=$arreglo;
            }
        }

    }else{
        //no esta y creamos la variable de sesion
        
        if (isset($_GET['id'])){
            $nombre = "";
            $precio = "";
            $imagen = "";
            $conexion = conexion();
            $consulta = ("select * from producto where id_producto=".$_GET['id']) or die($conexion->error);
            $resultadosql = mysqli_query($conexion,$consulta);
            $fila = mysqli_fetch_row($resultadosql);
            $nombre= $fila[1];
            $precio= $fila[2];
            $imagen= $fila[4];
            $arreglo[] = array(
                'Id'=>$_GET['id'],
                'Nombre'=>$nombre,
                'Precio'=>$precio,
                'Imagen'=>$imagen,
                'Cantidad'=> 1
            );
            $_SESSION['carrito']=$arreglo;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Stilos.css">
</head>

<body>

<header class="header">
    <h1 class="titulo text-center my-2">
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
    <h1 class=" text-center">PEDIDOS</h1>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12 " method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagen</th>
                                    <th class="product-name">Producto</th>
                                    <th class="product-price">Precio</th>
                                    <th class="product-quantity">Cantidad</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Eliminar</th>
                                    <th class="product-remove">Editar</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                if (isset($_SESSION['carrito'])){
                                    $arregloCarrito = $_SESSION['carrito'];
                                    for($i=0;$i<count($arregloCarrito);$i++){
                            ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="img/<?php echo $arregloCarrito[$i]['Imagen']?>" alt="Image" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']?></h2>
                                            </td>
                                            <td><?php echo $arregloCarrito[$i]['Precio']?></td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center" value="<?php echo $arregloCarrito[$i]['Cantidad']?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td><?php echo $arregloCarrito[$i]['Cantidad']*$arregloCarrito[$i]['Precio']?> Bs</td>
                                            <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                                            <td><a href="#" class="btn btn-primary btn-sm">+</a></td>
                                        </tr>
                            <?php
                                    }
                                }
                                //session_destroy();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cantidades Totales</h3>
                                </div>
                            </div>
                            <?php
                                if (isset($_SESSION['carrito'])){
                                    $arregloCarrito = $_SESSION['carrito'];
                                    $cantidadTotal=0;  
                                    for($i=0;$i<count($arregloCarrito);$i++){
                                        $cantidadTotal=$cantidadTotal+$arregloCarrito[$i]['Cantidad']*$arregloCarrito[$i]['Precio'];
                                    }

                            ?>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <span class="text-black">Subtotal</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?php echo $cantidadTotal ?> Bs</strong>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <span class="text-black">Total</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?php echo $cantidadTotal?> Bs</strong>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceder a pagar</button>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

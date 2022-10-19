<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stilosLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Mis estilos CSS -->
    <link rel="stylesheet" href="css/Stilos.css" />
    <title>RESTAURANTE</title>
  </head>
  <body>

    <section class="d-flex justify-content-center align-items-center">
      <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4 p-4">
        <div class="mb-4 d-flex justify-content-start align-items-center">
          <h4><i class=""></i> &nbsp; DATOS DEL USUARIO</h4>
        </div>
        <div class="mb-1">
          <form action="create.php" method="$_POST" id="contacto">
            <div class="mb-4 d-flex justify-content-between">
              <div>
                <label for="nombre">
                  <i class="bi bi-person-fill"></i> Nombres</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="nombre"
                  id="nombre"
                  placeholder="ej: Javier"
                  required
                />
                <div class="nombre text-danger"></div>
              </div>
              <div>
                <label for="apellido">
                  <i class="bi bi-person-bounding-box"></i> Paterno</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="paterno"
                  id="apellido"
                  placeholder="ej: Menacho"
                  required
                />
                <div class="apellido text-danger"></div>
              </div>
              <div>
                <label for="apellido">
                  <i class="bi bi-person-bounding-box"></i> Materno</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="materno"
                  id="apellido"
                  placeholder="ej: Menacho"
                  required
                />
                <div class="apellido text-danger"></div>
              </div>
            </div>
            <div class="mb-4">
              <label for="correo"
                ><i class="bi bi-envelope-fill"></i> Correo</label
              >
              <input
                type="email"
                class="form-control"
                name="correo"
                id="correo"
                placeholder="ej: umsa@mail.com"
                required
              />
              <div class="correo text-danger"></div>
            </div>
            
            <div class="mb-4">
              <label for=""
                ><i class=""></i> Celular</label
              >
              <input
                type="number"
                class="form-control"
                name="celular"
                id="celular"
                placeholder="ej: 75481125"
                required
              />
              <div class="mensaje text-danger"></div>
            </div>

            <div class="mb-4 d-flex justify-content-start align-items-center">
              <h4><i class=""></i> &nbsp; DATOS DE INGRESO</h4>
            </div>
          
            <div class="mb-4 d-flex justify-content-between">
              <div>
                <label for="Usuario">
                  <i class="bi bi-person-fill"></i> Usuario</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="usuario"
                  id="usuario"
                  placeholder="ej: ZEUS"
                  required
                />
                <div class="nombre text-danger"></div>
              </div>
            </div>
            
            <div class="mb-4">
              <label for="Contraseña"
                ><i class=""></i> Contraseña</label
              >
              <input
                type="password"
                class="form-control"
                name="password"
                id="contrasena"
                required
              />
              <div class="mensaje text-danger"></div>
            </div>
            <div class="mb-2">
              <button name="registrar"
                id="botton"
                class="col-12 btn btn-primary d-flex justify-content-between"
              >
                <span>REGISTRARSE</span><i id="icono" class="bi bi-cursor-fill"></i>
              </button>
            </div>
  
          </form>
        </div>
      </div>
    </section>
    <script src="Validacion.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<?php
require '../../sesion/Modelo/ModeloSesion.php';

$sesion = new Sesion();
$usuario = $sesion->getUsuario();
$avatar = $sesion->getAvatar();
$url = "../../images/avatar/" . $avatar;

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="../../images/veLogo.png" />

  <title>Reportes</title>

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" />
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="../../css/style.css" />

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header d-flex justify-content-center">
        <img src="../../images/veLogo.png" alt="Galaxia Seguridad LTDA" width="40" height="50" />
        <h3 class="mt-2"><b>Galaxia LTDA</b></h3>
      </div>

      <ul class="list-unstyled components" id="lateralMenu"></ul>
    </nav>

    <!-- Contenido de la pagina -->
    <div id="content">
      <nav class="navbar shadow-sm navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="hb btn btn-primary">
            <i class="fas fa-bars"></i>
          </button>
          <div class="div d-flex justify-content-end g-3 align-items-center">
            <i class="fas fa-expand-arrows-alt"></i>
            <i class="fas fa-bell text-center galaxia-red mx-3 fa-lg"></i>
            <img src="<?php echo $url ?>" alt="Avatar" class="avatar" />
            <!-- Drop -->
            <div class="btn-group">
              <button type="button" class="btn btn-link text-muted px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario ?><i class="fas fa-caret-down"></i></button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item text-primary" href="#">Cerrar sesion <i class="fas fa-sign-out-alt"></i></a>
              </div>
            </div>
            <!-- Fiish Drop -->
          </div>
        </div>
      </nav>

      <!-- Inicio cards reportes -->
      <div class="row d-flex justify-content-around">
        <div class="col-lg-4 col-sm-12 col-12 mb-4">
          <div class="card shadow-sm">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-users text-primary fa-3x"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3>156</h3>
                    <span><b>Ingresos ultimo mes</b></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-12 mb-sm-4 mb-4">
          <div class="card shadow-sm">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-user-check fa-3x text-success"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3>156</h3>
                    <span><b>Aforo</b></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-12 mb-4">
          <div class="card shadow-sm">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="fas fa-exclamation-triangle galaxia-red fa-3x"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3>156</h3>
                    <span><b>Visitantes bloqueados</b></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card de reportes grande -->
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header bg-white"><i class="fas fa-flag text-primary"></i> <b>Reportes</b></div>
            <div class="card-body">
              <div class="row g-3 mb-4 align-items-center">
                <div class="mb-3 col-12 col-sm-12 col-xl-6">
                  <label for="inputPassword6" class="form-label">Fecha inicial:</label>
                  <input type="date" class="form-control" />
                </div>
                <div class="mb-3 col-12 col-sm-12 col-xl-6">
                  <label for="inputPassword6" class="form-label">Fecha final:</label>
                  <input type="date" class="form-control" />
                </div>
              </div>
              <div class="row d-flex justify-content-around">
                <div class="col-12 col-sm-5 col-xl-3 mb-4 mb-sm-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <div class="card-title"><b>Lista de visitantes</b></div>
                      <div class="media-body">
                        <a href=""> Descargar <i class="fas fa-download text-primary"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-5 col-xl-3 mb-4 mb-sm-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <div class="card-title"><b>Lista de origen</b></div>
                      <div class="media-body">
                        <a href=""> Descargar <i class="fas fa-download text-primary"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-5 col-xl-3 mb-4 mb-sm-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <div class="card-title"><b>Tipos de persona</b></div>
                      <div class="media-body">
                        <a href=""> Descargar <i class="fas fa-download text-primary"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-5 col-xl-3 mb-4 mb-sm-4">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <div class="card-title"><b>Lista de genero</b></div>
                      <div class="media-body">
                        <a href=""> Descargar <i class="fas fa-download text-primary"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-5 col-xl-3">
                  <div class="card bg-light">
                    <div class="card-body text-center">
                      <div class="card-title"><b>Lista de zonas</b></div>
                      <div class="media-body">
                        <a href=""> Descargar <i class="fas fa-download text-primary"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="../../app/hbMenu.js"></script>
  <script src="../../app/lateralMenu.js"></script>
</body>

</html>
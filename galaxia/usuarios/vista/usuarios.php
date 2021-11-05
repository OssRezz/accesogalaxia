<?php
require '../../sesion/Modelo/ModeloSesion.php';
require '../../admin/Modelo/ModeloAdmin.php';
require '../Modelo/ModeloUsuarios.php';

$empresa = new Admin();
$sesion = new Sesion();
$usuario = $sesion->getUsuario();
$perfil = $sesion->getPerfil();

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
  <title>Usuarios</title>

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

<body class="scrolly">
  <div id="respuesta">
    <input type="hidden" id="perfil" value="<?php echo $perfil ?>">
  </div>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header d-flex justify-content-center">
        <img src="../../images/veLogo.png" alt="Galaxia Seguridad LTDA" width="40" height="50" />
        <h3 class="mt-2"><b>Galaxia LTDA</b></h3>
      </div>

      <ul class="list-unstyled components" id="lateralMenu"></ul>
    </nav>

    <!-- Top de la pagina -->
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

      <!-- Inicio de conteido -->
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-12 col-lg-6 mb-4">
          <div class="card">
            <div class="card-header"><i class="fas fa-plus-circle text-primary"></i> <b>Formulario de Usuarios</b></div>
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="col mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre completo" />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col mb-3">
                    <label for="documento" class="form-label">Documento</label>
                    <input type="text" class="form-control" id="documento" placeholder="Ingrese el documento de identidad" />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" />
                  </div>
                </div>
                <div class="form-row mb-3">
                  <div class="col mb-3">
                    <label for="perfil" class="form-label">Perfil</label>
                    <select class="form-control" id="perfil">
                      <?php
                      $Sesion = $sesion->listaDeRoles();
                      if ($Sesion != null) {
                        foreach ($Sesion as $Sesion) {
                      ?>
                          <option value="<?php echo $Sesion['rolId'] ?>"><?php echo $Sesion['rolPerfil'] ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col">
                    <label for="empresa" class="form-label">Empresa</label>
                    <select class="form-control" id="empresa">
                      <?php
                      $Empresa = $empresa->listaDeEmpresas();
                      if ($Empresa != null) {
                        foreach ($Empresa as $Empresa) {
                      ?>
                          <option value="<?php echo $Empresa['empId'] ?>"><?php echo $Empresa['empNombre'] ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col mb-3">
                    <button type="button" id="btn-cancelar-usuario" class="btn btn-outline-primary col-12">Cancelar</button>
                  </div>
                  <div class="col">
                    <button type="button" id="btn-ingresar-usuario" class="btn btn-outline-primary col-12">Ingresar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header"><i class="fas fa-th-list text-primary"></i> <b>Lista de Usuarios</b></div>
            <div class="card-body">
              <form class="">
                <div class="form-row"></div>
              </form>
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
  <script src="../app/script.js"></script>
</body>

</html>
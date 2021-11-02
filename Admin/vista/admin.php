<?php
require '../Modelo/ModeloAdmin.php';
require '../../sesion/Modelo/ModeloSesion.php';

$admin = new Admin();

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

  <title>Administracion</title>

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
  <div id="respuesta"></div>
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
        <div class="col-lg-6 col-sm-12 col-12 mb-4">
          <div class="card shadow-sm">
            <div class="card-header"><i class="fas fa-building text-primary"></i> Lista de empresas</div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table" id="tableBussiness">
                  <?php
                  $Empresas = $admin->listaDeEmpresas();
                  if ($Empresas != null) {

                  ?>
                    <tr>
                      <th>Nit</th>
                      <th>Empresa</th>
                      <th>Estado</th>
                      <th class="text-center">Accion</th>
                    </tr>
                    <tr>
                      <?php
                      foreach ($Empresas as $Empresas) {
                      ?>
                        <td><?php echo $Empresas['empId'] ?></td>
                        <td><?php echo $Empresas['empNombre'] ?></td>

                        <?php
                        if ($Empresas['empEstado'] === "1") {
                          $empresa = "Activo";
                        } else {
                          $empresa = "Inactivo";
                        }
                        ?>

                        <td><?php echo $empresa ?></td>
                        <td class="text-center"><a href=""><i class="fas fa-edit text-primary"></i></a></td>

                    </tr>
                  <?php
                      }
                    } else {
                  ?>
                  <small>No hay empresas registradas</small>
                <?php
                    }
                ?>
                </table>
              </div>
              <div class="card-footer p-0 d-flex justify-content-center">
                <button class="btn btn-outline-primary btn-block" id="btn-agregar-empresa">Agregar empresa</button>
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
  <script src="../app//script.js"></script>
  <script src="../app/pagination.js"></script>
</body>

</html>
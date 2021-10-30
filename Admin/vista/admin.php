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
              <img src="../../images/avatar.png" alt="Avatar" class="avatar" />
              <!-- Drop -->
              <div class="btn-group">
                <button type="button" class="btn btn-link text-muted px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">David Rodriguez <i class="fas fa-caret-down"></i></button>
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
              <div class="card-header"><i class="far fa-building"></i> Formulario empresas</div>
                <div class="card-body">

                  <table class="table-sm">
                    <tr>
                      <th>Nit</th>
                      <th>Empresa</th>
                      <th>Estado</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                  <div class="card-footer p-0 d-flex justify-content-center">
                    <button class="btn btn-outline-primary btn-block">Agregar empresa</button>
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

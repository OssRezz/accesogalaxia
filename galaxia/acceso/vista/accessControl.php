<?php
require '../Modelo/ModeloAcceso.php';
require '../../sesion/Modelo/ModeloSesion.php';

$adicciones =  new Acceso();
$sesion = new Sesion();

$empresa = $sesion->getEmpresa();
$perfil = $sesion->getPerfil();
$empresaEstado = $adicciones->listaAdicciones($empresa);
if($empresaEstado){
  $empresaEstado = [];
}


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

  <title>Control de acceso</title>

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

      <div class="row">
        <div class="col mb-4">
          <div class="card">
            <div class="card-header"><i class="fas fa-door-open text-primary"></i> <b>Formulario control de acceso</b></div>
            <div class="card-body">
              <form action="">
                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Fecha de entrada: </label>
                    <input type="date" class="form-control form-control-sm" disabled />
                  </div>
                  <div class="col">
                    <label for="">Hora de entrada: </label>
                    <input type="time" class="form-control form-control-sm" disabled />
                  </div>
                </div>
                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Documento de identidad: </label>
                    <input type="number" class="form-control form-control-sm" placeholder="Documento de identidad" />
                  </div>
                  <div class="col">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nombre de la persona" />
                  </div>
                </div>
                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Genero: </label>
                    <input type="text" class="form-control form-control-sm" placeholder="Genero de la persona" />
                  </div>
                  <div class="col">
                    <label for="">Tipo de sangre: </label>
                    <input type="text" class="form-control form-control-sm" placeholder="Tipo de sangre" />
                  </div>
                </div>
                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Tipo de persona: </label>
                    <select class="form-control form-control-sm" id="">
                      <option value="">Visitante</option>
                      <option value="">Admistrador</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="">Zona de destino: </label>
                    <select class="form-control form-control-sm" id="">
                      <option value="">Piscina</option>
                      <option value="">Consultorio</option>
                    </select>
                  </div>
                </div>
                <?php
                foreach ($empresaEstado as $empresaEstado) {
                  if ($empresaEstado['adiCampo'] === "Arma" && $empresaEstado['adiEstado'] === "1") {
                ?>
                    <div class="form-row mb-3">
                      <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                        <label for="label">Arma: </label>
                        <select class="form-control form-control-sm" id="arma">
                          <option value="0">No</option>
                          <option value="1">Si</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="label">Serie: </label>
                        <input type="text" id="serie" class="form-control form-control-sm" placeholder="Serial del arma" disabled />
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
                  if ($empresaEstado['adiCampo'] === "Computador" && $empresaEstado['adiEstado'] === "1") {
                  ?>
                    <div class="form-row mb-3 d-flex justify-content-center">
                      <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                        <label for="label">Computador: </label>
                        <select id="computador" class="form-control form-control-sm" id="">
                          <option value="0">No</option>
                          <option value="1">Si</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="label">Referencia: </label>
                        <input type="text" id="referencia" class="form-control form-control-sm" placeholder="Referencia del computador" disabled />
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
                  if ($empresaEstado['adiCampo'] === "Vehiculo" && $empresaEstado['adiEstado'] === "1") {
                  ?>
                    <div class="form-row mb-4">
                      <div class="col-12 col-sm-12 col-lg-6  mb-3 mb-sm-3 mb-xl-0">
                        <label for="label">Vehiculo: </label>
                        <select class="form-control form-control-sm" id="vehiculo">
                          <option value="0">No</option>
                          <option value="1">Si</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="label">Placa: </label>
                        <input type="text" id="placa" class="form-control form-control-sm" placeholder="Ingrese la placa del veihculo" disabled />
                      </div>
                    </div>
                <?php
                  }
                }
                ?>
                <div class="form-row d-flex justify-content-center">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <button class="btn btn-outline-primary btn-block btn-sm">Cancelar</button>
                  </div>
                  <div class="col">
                    <button class="btn btn-outline-primary btn-block btn-sm">Ingresar acceso</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header border-bottom-0"><i class="fas fa-th-list text-primary"></i> <b>Rendimientos registrados</b></div>
            <div class="card-body p-0">
              <table class="table border table-hover table-sm">
                <tr>
                  <th>Persona</th>
                  <th>Acciòn</th>
                </tr>
                <tr>
                  <td>James Osorio Florez</td>
                  <td>
                    <div class="d-flex justify-content-end">
                      <button class="btn btn-outline-primary btn-sm mr-1 text-center" style="width: 60px">Info</button>
                      <button class="btn btn-outline-success btn-sm text-center" style="width: 60px">Salida</button>
                    </div>
                  </td>
                </tr>
              </table>
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
  <script src="../app/disabledAccess.js"></script>
  <script src="../../app/lateralMenu.js"></script>
</body>

</html>
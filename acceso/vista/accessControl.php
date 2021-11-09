<?php
require '../Modelo/ModeloAcceso.php';
require '../../sesion/Modelo/ModeloSesion.php';
require '../../configuracion/Modelo/ModeloConfig.php';
date_default_timezone_set("America/Bogota");

$acceso =  new Acceso();
$sesion = new Sesion();
$config = new Config();

$empresa = $sesion->getEmpresa();
$perfil = $sesion->getPerfil();

//Lista para controlar el estado de las adicciones en la vista
$empresaEstado = $acceso->listaAdicciones($empresa);
if ($empresaEstado === null) {
  $empresaEstado = [];
}

$date = date('Y-m-d');
$Tiempo = date("h:i");

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
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header"><i class="fas fa-door-open text-primary"></i> <b>Formulario control de acceso</b></div>
            <div class="card-body">
              <form id="frmAccess">
                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6  col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Fecha de entrada: </label>
                    <input type="hidden" id="empresaUser" value="<?php echo $empresa ?>">
                    <input type="date" id="fechaEntrada" value="<?php echo $date ?>" class="form-control form-control-sm" disabled />
                  </div>
                  <div class="col">
                    <label for="">Hora de entrada: </label>
                    <input type="time" id="horaEntrada" value="<?php echo $Tiempo ?>" class="form-control form-control-sm" disabled />
                  </div>
                </div>


                <div class="form-row mb-3">
                  <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Documento de identidad: </label>
                    <input type="number" id="documento" class="form-control form-control-sm" placeholder="Documento de identidad" />
                  </div>
                  <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
                    <label for="">Nombre: </label>
                    <input type="text" id="nombre" class="form-control form-control-sm" placeholder="Nombre de la persona" />
                  </div>
                  <div class="col-12 col-sm-12 col-lg-12 col-xl-4 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Genero: </label>
                    <input type="text" id="genero" class="form-control form-control-sm" placeholder="Genero de la persona" />
                  </div>
                </div>

                <div class="form-row mb-4">
                  <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
                    <label for="">Tipo de sangre: </label>
                    <input type="text" id="tSangre" class="form-control form-control-sm" placeholder="Tipo de sangre" />
                  </div>
                  <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Tipo de persona: </label>
                    <select class="form-control form-control-sm" id="tPersona">
                      <?php
                      $listaPersona = $acceso->listaDePersonas();
                      if ($listaPersona != null) {
                        foreach ($listaPersona as $listaPersona) {
                      ?>
                          <option value="<?php echo $listaPersona['tipId'] ?>"><?php echo $listaPersona['tipPersona'] ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-12 col-sm-12 col-lg-12 col-xl-4 mb-3 mb-sm-3 mb-xl-0">
                    <label for="">Zona de destino: </label>
                    <select class="form-control form-control-sm" id="zDestino">
                      <?php
                      $ListaZonas = $config->listaDeZonasByEmpresa($empresa);
                      if ($ListaZonas != null) {
                        foreach ($ListaZonas as $ListaZonas) {
                      ?>
                          <option value="<?php echo $ListaZonas['zonId'] ?>"><?php echo $ListaZonas['zonNombre'] ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <?php
                foreach ($empresaEstado as $empresaEstado) {
                  if ($empresaEstado['adiCampo'] === "Origen" && $empresaEstado['adiEstado'] === "1") {
                ?>
                    <div class="form-row mb-4">
                      <div class="col-12 col-sm-12 col-lg-12 mb-3 mb-sm-3 mb-xl-0">
                        <label for="label">Origen: </label>
                        <select class="form-control form-control-sm" id="origen">
                          <?php
                          $listaOrigen = $config->listaDeOrigenesByEmpresa($empresa);
                          if ($listaOrigen != null) {
                            foreach ($listaOrigen as $listaOrigen) {
                          ?>
                              <option value="<?php echo $listaOrigen['oriId'] ?>"><?php echo $listaOrigen['oriOrigen'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
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
                        <select id="computador" class="form-control form-control-sm">
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
                  } else {
                  ?>
                <?php
                  }
                }
                ?>
                <div class="form-row d-flex justify-content-center">
                  <div class="col-12 col-sm-12 col-lg-6 mb-3 mb-sm-3 mb-xl-0">
                    <button type="button" id="btn-reset" onClick="reset" class="btn btn-outline-primary btn-block btn-sm">Cancelar</button>
                  </div>
                  <div class="col">
                    <button type="button" id="btn-ingresar-acceso" class="btn btn-outline-primary btn-block btn-sm">Ingresar acceso</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header border-bottom-0"><i class="fas fa-th-list text-primary"></i> <b>Accesos registrados</b></div>
            <div class="card-body p-0 px-3">
              <table class="table  table-hover table-sm">
                <tr>
                  <th class="">Documento</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Hora entrada</th>
                  <th class="text-center">Acciòn</th>
                </tr>
                <tr>
                  <?php
                  $listaAcceso = $acceso->listaAccesos($empresa);
                  if ($listaAcceso != null) {
                    foreach ($listaAcceso as $listaAcceso) {

                  ?>
                      <td class=""><?php echo $listaAcceso['accDocumento']  ?></td>
                      <td class="text-center"><?php echo $listaAcceso['accNombre']  ?></td>
                      <td class="text-center"><?php echo $listaAcceso['accHoraEntrada']  ?></td>
                      <td class="text-center">
                        <?php
                        if ($listaAcceso['accHoraSalida'] === null) {
                        ?>
                          <button class="btn btn-outline-primary  btn-sm mr-1 text-center" value="<?php echo $listaAcceso['accId']  ?>" style="width: 60px">Info</button>
                          <button class="btn btn-outline-success  btn-sm text-center" id="btn-salida" value="<?php echo $listaAcceso['accId']  ?>" style="width: 60px">Salida</button>
                        <?php
                        } else {
                        ?>
                          <button class="btn btn-outline-primary  btn-sm mr-1 text-center" value="<?php echo $listaAcceso['accId']  ?>" style="width: 60px">Info</button>
                        <?php
                        }
                        ?>
                      </td>
                </tr>
            <?php
                    }
                  }
            ?>
              </table>
            </div>
          </div>
        </div>
        <div class="col-4 col-sm-12 col-lg-4 col-xl-4">
          <div class="card">
            <div class="card-header"><i class="fas fa-search text-primary"></i><b> Acciones</b></div>
            <div class="card-body p-0">
              <div class="col mt-3 mb-3">
                <label for="">Buscar acceso</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="BuscarProduccion">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="btn-buscar-produccion">
                      <i class="fa fa-search" style="pointer-events: none;"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col">
                <label for="">Salida de acceso para todos</label>
                <button class="btn btn-outline-primary btn-block">Salida total</button>
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
    <script src="../app/script.js"></script>
</body>

</html>
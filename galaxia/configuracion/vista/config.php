<?php
require '../../sesion/Modelo/ModeloSesion.php';
require '../Modelo/ModeloConfig.php';

$config = new Config();
$sesion = new Sesion();
$usuario = $sesion->getUsuario();
$perfil = $sesion->getPerfil();
$idUsuario = $sesion->getIdUsuario();
$empresaUser = $sesion->getEmpresa();

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
    <title>Configuracion</title>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../css/style.css" />

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
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
                        <div class="btn-group ">
                            <button type="button" class="btn btn-link text-muted px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                David Rodriguez <i class="fas fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-primary" href="#">Cerrar sesion <i class="fas fa-sign-out-alt"></i></a>
                            </div>
                        </div>
                        <!-- Fiish Drop -->
                    </div>
                </div>
            </nav>

            <!-- Inicio de conteido -->
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-key text-primary"></i> <b>Cambiar contraseña</b>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="primerPassword" class="form-label">Contraseña:</label>
                                        <input type="hidden" id="idUsuario" value="<?php echo $idUsuario ?>">
                                        <input type="password" class="form-control" id="primeraPassword" placeholder="Ingrese la nueva contraseña" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="segundoPassword" class="form-label">Contraseña:</label>
                                        <input type="password" class="form-control" id="segundoPassword" placeholder="Repita la nueva contraseña" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" id="btn-cambiar-password" class="btn btn-outline-primary btn-block">Cambiar contraseña</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <input type="hidden" id="empresaUser" value="<?php echo $empresaUser ?>">
                            <i class="fas fa-map-marked-alt text-primary"></i><b> Lista de zonas</b>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover" id="tableBussiness">
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Zona</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        $Zonas = $config->listaDeZonasByEmpresa($empresaUser);
                                        if ($Zonas != null) {
                                            foreach ($Zonas as $Zonas) {

                                        ?>
                                                <td><?php echo $Zonas['empNombre'] ?></td>
                                                <td><?php echo $Zonas['zonNombre'] ?></td>
                                    </tr>
                            <?php
                                            }
                                        }
                            ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" id="btn-modal-zona" class="btn btn-outline-primary btn-block">Agregar nueva zona</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-compass text-primary"></i> <b>Lista de origen</b>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover" id="tableBussiness">
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Origen</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        $Origenes = $config->listaDeOrigenesByEmpresa($empresaUser);
                                        if ($Origenes != null) {
                                            foreach ($Origenes as $Origenes) {

                                        ?>
                                                <td><?php echo $Origenes['empNombre'] ?></td>
                                                <td><?php echo $Origenes['oriOrigen'] ?></td>
                                    </tr>
                            <?php
                                            }
                                        }
                            ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" id="btn-modal-origen" class="btn btn-outline-primary btn-block">Agregar nuevo origen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-lg-12 col-xl-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-exclamation-circle text-primary"></i> <b>Bloquear persona</b>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer">
                            <div class="col">
                                <button type="submit" id="Ingresar" class="btn btn-outline-primary col-12">Bloquear visitante</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-plus-circle text-primary"></i> <b>Lista de adiciones</b>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <div class="card"></div>

            </div>
        </div>
    </div>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="../../app/lateralMenu.js"></script>
    <script src="../../app/hbMenu.js"></script>
    <script src="../app//script.js"></script>
</body>

</html>
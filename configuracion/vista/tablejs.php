<?php
require '../../sesion/Modelo/ModeloSesion.php';
require '../Modelo/ModeloConfig.php';
require '../../usuarios/Modelo/ModeloUsuarios.php';


$ModeloUsu = new Usuarios();
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

    <title>Control de acceso</title>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    Our Custom CSS -->
    <link rel="stylesheet" href="../../css/style.css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>

    <script src="../app/pagination.js"></script>
    <script src="../app/bootstrap-table-pagination.js"></script>
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


            <div class="col">
                <div class="card">
                    <div class="card-header border-bottom-0"><i class="fas fa-th-list text-primary"></i> <b>Rendimientos registrados</b></div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>perfil</th>
                                    </tr>
                                </thead>
                                <tbody id="developers">
                                    <?php
                                    $ListaUsuarios = $ModeloUsu->listaDeUsuarios();
                                    if ($ListaUsuarios != null) {
                                        foreach ($ListaUsuarios as $ListaUsuarios) {
                                    ?>
                                            <tr>
                                                <td><?php echo $ListaUsuarios['id']; ?></td>
                                                <td><?php echo $ListaUsuarios['nombre']; ?></td>
                                                <td><?php echo $ListaUsuarios['documento']; ?></td>
                                                <td><?php echo $ListaUsuarios['perfil']; ?></td>
                                            </tr
                                </tbody>
                        <?php
                                        }
                                    }
                        ?>
                            </table>
                            <div class="col-md-12 text-center">
                                <ul class="pagination pager" id="developer_page"></ul>
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
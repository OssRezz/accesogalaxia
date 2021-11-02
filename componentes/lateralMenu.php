<?php

$perfil = $_POST['perfil'];
$title = $_POST['title'];

function adminMenu($title)
{
    $Usuarios = "";
    $Administracion = "";
    if ($title === "Usuarios") {
        $Usuarios = "active";
    } else if ($title === "Administracion") {
        $Administracion = "active";
    }
    echo  "<li class='$Usuarios'>";
    echo  "<a href='../../usuarios/vista/usuarios.php'><i class='fas fa-user'></i> Usuarios</a>";
    echo  "</li>";
    echo  "<li class='$Administracion'>";
    echo  "<a href='../../admin/vista/admin.php'><i class='fas fa-user-shield'></i> Administracìon</a>";
    echo  "</li>";
}

function clienteMenu($title)
{
    $reportes = "";
    $Configuraciones = "";

    if ($title === "Reportes") {
        $reportes = "active";
    } else if ($title === "Configuraciones") {
        $Configuraciones = "active";
    }
    echo  "<li class='$reportes'>";
    echo  "<a href='../../reportes/vista/reportes.php'><i class='fas fa-flag'> </i> Reportes</a>";
    echo  "</li>";

    echo  "<li class='$Configuraciones'>";
    echo  "<a href='#'><i class='fas fa-cog'></i> Configuraciòn</a>";
    echo  "</li>";
}

function vigilanteMenu($title)
{
    $Acceso = "";
    if ($title === "Control de acceso") {
        $Acceso = "active";
    }
    echo  "<li class='$Acceso'>";
    echo  "<a href='../../acceso/vista/accessControl.php'><i class='fas fa-door-open'></i> Control de acceso</a>";
    echo  "</li>";
}


switch ($perfil) {
    case 1:
        adminMenu($title);
    case 2:
        clienteMenu($title);
    case 3:
        vigilanteMenu($title);
        break;
}

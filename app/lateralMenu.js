$(document).ready(function () {
  const perfil = 1;
  const title = $(document).attr("title");

  //Carga el menu lateral, dependiendo del rol del usuario

  $.post("../../componentes/lateralMenu.php",{
      perfil: perfil,
      title: title,
    },function (responseText) {
      $("#lateralMenu").html(responseText);
    }
  );
});

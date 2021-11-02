$(document).ready(function () {
  const perfil = $("#perfil").val();
  const title = $(document).attr("title");
  console.log(perfil)
  //Carga el menu lateral, dependiendo del rol del usuario

  $.post("../../componentes/lateralMenu.php",{
      perfil: perfil,
      title: title,
    },function (responseText) {
      $("#lateralMenu").html(responseText);
    }
  );
});

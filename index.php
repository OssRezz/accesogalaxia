<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="images/veLogo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="loginApp.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Iniciar sesiòn</title>
</head>

<body class="index">
    <div class="container" id="respuesta">

        <div class="row d-flex justify-content-center">

            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">

                <div class="card login p-0 mb-3 bg-white rounded">

                    <div class="card-header text-center bg-white text-dark border-0 mt-2 pb-0">
                        <img src="images/veLogo.png" class="mb-2" width="100" height="120" class="d-inline-block">
                        <br>
                        <small class="p-0 m-0">¡La seguridad tambien depende de usted!</small>
                        <hr class=" mt-0 w-85">
                    </div>

                    <div class="card-body text-muted pt-3">

                        <div class="form-row mb-3">
                            <div class="form-group col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-dark "><i class="fas fa-user"></i></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="documento" placeholder="Documento de identidad">
                                </div>


                            </div>
                            <div class="form-group col-12 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-dark"><i class="fas fa-key"></i></span>

                                    </div>
                                    <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">

                                </div>
                            </div>
                        </div>

                        <div class="form-row d-flex justify-content-center px-1">
                            <button type="button" class="btn btn-block btn-outline-dark inicio" id="btn-ingresar">Iniciar sesión</button>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app/formLogin.js"></script>
</body>

</html>
<?php

include_once '../template.php';

//  Iniciar sesion
session_start();

//  Verificar si el usuario esta logeado
if (isset($_SESSION['user'])) {
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Card en centro de pantalla -->
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <p class="text-center m-0">Registro</p>
                    </div>
                    <div class="card-body">
                        <form action="../back/register.php" method="POST">
                            <?php
                            if (isset($errorRegister)) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                <?php
                                echo $errorRegister;
                                unset($errorRegister);
                                ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apaterno" name="apaterno" required>
                            </div>
                            <div class="mb-3">
                                <label for="amaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="amaterno" name="amaterno" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="fnacimiento" class="form-label">Fecha Nacimiento</label>
                                <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="login.php">Iniciar Sesión</a>
                                <button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
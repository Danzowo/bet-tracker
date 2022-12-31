<?php
include_once '../models/User.php';
// include_once '../models/UserSession.php';

$user = new User();

if (isset($_SESSION['user'])) {
    header('Location: ../views/home.php');
}

if( !$user -> getUsername( $_POST['username'] ) ){

    $register = $user->insertUser(
        $_POST['nombre'],
        $_POST['apaterno'],
        $_POST['amaterno'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['fnacimiento'],
    );

    if ($register) {
        header('Location: ../views/login.php');
    } else {
        $errorRegister = "Error al registrar";
        include_once '../views/register.php';
    }

}else{
    $errorRegister = "El usuario ya existe";
    include_once '../views/register.php';
}
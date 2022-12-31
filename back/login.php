<?php
include_once '../models/User.php';
include_once '../models/UserSession.php';

//  Objetos de usuario
$userSession = new UserSession();
$user = new User();

if( isset($_SESSION['user']) ){

    header('Location: ../views/home.php');

}elseif( isset( $_POST['username'] )  && ( isset($_POST['password']) ) ){

    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if( $user -> userExists( $userForm, $passForm ) ){

        $userSession -> setCurrentUser( $userForm );
        $user -> setUser( $userForm );
        
        header('Location: ../views/home.php');
    }else{
        $errorLogin = 'Nombre de usuario y/o contraseña incorrectos';
        include_once '../views/login.php';
    }
}else{
    include_once '../views/login.php';
}
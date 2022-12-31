<?php

include_once '../template.php';

//  Iniciar sesion
session_start();

//  Verificar si el usuario esta logeado
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}


top();

bottom();
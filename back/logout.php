<?php

include_once '../models/UserSession.php';

session_start();

$user = new UserSession();

//  Cierra la sesion y lo redirige al login
$user->closeSession();
header('Location: ../views/login.php');
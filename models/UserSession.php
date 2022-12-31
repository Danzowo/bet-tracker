<?php

class UserSession
{

    //  Constructor para iniciar la sesion
    public function __construct()
    {
        session_start();
    }

    //  Guardar el usuario en la sesion actual
    public function setCurrentUser($user)
    {
        $_SESSION['user'] = $user;
    }

    //  Obtener el usuario de la sesion actual
    public function getCurrentUser()
    {
        return $_SESSION['user'];
    }

    //  Cerrar sesion
    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
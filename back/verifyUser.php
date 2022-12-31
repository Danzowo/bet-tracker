<?php

include_once '../models/User.php';

$user = new User();
$usernamme = $_POST['username'];

foreach ($user->getUsers() as $currentUser) {
    if( $currentUser['username'] == $username )
        return 1;
}

?>
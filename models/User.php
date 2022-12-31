<?php

include_once '../db/db.php';

class User extends DB{

    private $name;
    private $username;

    //  Funcioon para saber si el usuario existe
    public function userExists( $user,  $pass )
    {
        
        $md5pass = md5($pass);

        //  Me traigo las credenciales del usuario
        $query = $this -> connect() -> prepare('SELECT * FROM users_access WHERE username = :user AND password = :pass');
        $query -> execute(['user' => $user, 'pass' => $md5pass]);

        //  Si no existe retorno FALSE
        if( !$query -> rowCount() )
            return false;
        return true;
    }

    public function setUser( $user )
    {
        $query = $this->connect()->prepare('SELECT * FROM users_access WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUsername( $username )
    {
        $query = $this->connect()->prepare('SELECT * FROM users_access WHERE username = :user');
        $query->execute(['user' => $username]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    //  Insertar usuario
    public function insertUser($first_name, $last_name, $second_last_name, $username, $email,  $password,  $birth_date)
    {

        //  Inserta en la tabla users_access
        $query = $this->connect()->prepare('INSERT INTO users_access (username, email, password) VALUES (:username, :email, :password)');
        $query->execute(['username' => $username, 'email' => $email, 'password' => md5($password)]);

        if ($query) {
            $query = $this->connect()->prepare('SELECT * FROM users_access WHERE username = :username');
            $query->execute(['username' => $username]);
            foreach ($query as $currentUser) {
                $last_id = $currentUser['access_id'];
            }

            //  Inserta en la tabla users
            $query = $this->connect()->prepare('INSERT INTO users (access_id, first_name, last_name, second_last_name, email, birth_date) VALUES (:access_id, :first_name, :last_name, :second_last_name, :email, :birth_date)');
            $query->execute(['access_id' => $last_id, 'first_name' => $first_name, 'last_name' => $last_name, 'second_last_name' => $second_last_name, 'email' => $email, 'birth_date' => $birth_date]);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //  Obtener todos los usuarios
    public function getUsers()
    {
        $items = [];
        $query = $this->connect()->query('SELECT * FROM users');

        foreach ($query as $currentUser) {
            $item = new User();
            $item->id = $currentUser['user_id'];
            $item->nombre = $currentUser['first_name'];
            $item->username = $currentUser['username'];
            array_push($items, $item);
        }
        return $items;
    }
}

?>
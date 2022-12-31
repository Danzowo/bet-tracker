<?php

Class DB {

    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    //  Constructor
    public function __construct(){
        $this -> host = 'localhost';
        $this -> db = 'bet_tracker';
        $this -> user = 'root';
        $this -> pass = '';
        $this -> charset = 'utf8mb4';

    }
    
    //  Funcion que conecta la Base de Datos
    function connect(){
        try{
            $connection = "mysql:host=" . $this -> host . ";dbname=" . $this -> db . ";charset=" . $this -> charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO( $connection, $this -> user, $this -> pass, $options );
            return $pdo;
        }catch( PDOException $e ){
            print_r('Error al conectar: ' . $e -> getMessage());
        }
    }
}

?>
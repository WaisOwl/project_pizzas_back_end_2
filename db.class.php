<?php

class db
{

    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch(PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        } 
        //todo esto es para conectarse a la base de datos
        return $this->connection;
    }

  public function run($query, $args = []){

    $stmt=$this->connection->prepare($query);
    $stmt->execute($args);
    return $stmt;

}

}

?>
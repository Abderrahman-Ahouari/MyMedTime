<?php

class database {
     private static $instance = null;
     private $connection;

     private $host = 'localhost';
     private $dbname = 'MYMEDTIME';
     private $username = 'postgres';
     private $password = '742006';

     public function __construct() {
        try {
            $this->connection = new PDO("pgsql:host={$this->host};dbname={$this->dbname};user={$this->username};password={$this->password}");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection successful!";
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
     }

     public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>

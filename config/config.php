<?php
try {
    
    $pdo->

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}


class database {
     private static $instance = null;
     private $connection;

     private $host = 'localhost';
     private $dbname = 'test';
     private $username = 'postgres';
     private $password = '742006'  ;

     public function __construct() {
        try{
        $this->connection = new PDO("pgsql:host={$this->host};dbname={$this->dbname}, {$this->username}, {$this->password}");
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
     }  

     public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
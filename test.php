<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=MYMEDTIME", "postgres", "742006");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"hhhhhhhh";

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

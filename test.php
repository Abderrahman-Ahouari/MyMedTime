<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=test", "postgres", "742006");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
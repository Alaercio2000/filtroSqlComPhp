<?php

$db = "mysql:dbname=osmakers;host=127.0.0.1";
$userDb = "root";
$passwordDb = "";

try {
    $pdo = new PDO($db,$userDb,$passwordDb);
    header("Location: index.php");
} catch (PDOException $e) {
    echo ("Deu Ruim Parça" .$e->getMessage());
    header("Location: createBanco.php");
}
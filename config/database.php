<?php

$host = 'localhost';
$db   = 'sia_pawon';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // If database doesn't exist, we might want to handle it during migration
     // For now, just a simple connection
     $pdo = null;
}

/**
 * Global function to get PDO connection
 */
function getDB() {
    global $pdo, $host, $user, $pass, $charset, $options, $db;
    if ($pdo === null) {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass, $options);
    }
    return $pdo;
}

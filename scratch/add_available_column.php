<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';

try {
    $db = Database::getInstance()->getConnection();
    $db->exec("ALTER TABLE menus ADD COLUMN is_available TINYINT(1) DEFAULT 1");
    echo "Column is_available added successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

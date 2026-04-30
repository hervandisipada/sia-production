<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';

try {
    $db = Database::getInstance()->getConnection();
    $db->exec("ALTER TABLE menus ADD COLUMN is_best_seller TINYINT(1) DEFAULT 0");
    echo "Column is_best_seller added successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

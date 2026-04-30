<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';

try {
    $db = Database::getInstance()->getConnection();
    $db->exec("ALTER TABLE menus ADD COLUMN kategori ENUM('Makanan', 'Minuman') DEFAULT 'Makanan'");
    echo "Column kategori added successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

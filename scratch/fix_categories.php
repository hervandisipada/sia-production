<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';

try {
    $db = Database::getInstance()->getConnection();
    
    // Update drinks
    $drinks = [
        'Teh', 'Jeruk', 'Aqua', 'Nutrisari', 'Susu', 'Kopi', 'Lemon', 'Milo', 'Jus', 'Mineral', 'Soda', 'Es'
    ];
    
    foreach ($drinks as $drink) {
        $stmt = $db->prepare("UPDATE menus SET kategori = 'Minuman' WHERE nama LIKE ?");
        $stmt->execute(['%' . $drink . '%']);
    }
    
    echo "Categories updated successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

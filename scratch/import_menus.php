<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';

$menus = [
    ['nama' => 'Mie Bakso Biasa', 'harga' => 15000, 'best' => 1],
    ['nama' => 'Mie Bakso Urat', 'harga' => 18000, 'best' => 1],
    ['nama' => 'Mie Bakso Campur', 'harga' => 17000, 'best' => 0],
    ['nama' => 'Mie Ayam', 'harga' => 15000, 'best' => 1],
    ['nama' => 'Mie Ayam Bakso Biasa', 'harga' => 19000, 'best' => 0],
    ['nama' => 'Mie Ayam Bakso Urat', 'harga' => 21000, 'best' => 1],
    ['nama' => 'Soto Ayam', 'harga' => 13000, 'best' => 0],
    ['nama' => 'Soto Ayam + Nasi', 'harga' => 18000, 'best' => 0],
    ['nama' => 'Gado-Gado', 'harga' => 14000, 'best' => 1],
    ['nama' => 'Gado-Gado Telur', 'harga' => 16000, 'best' => 0],
    ['nama' => 'Ayam Goreng Lalapan', 'harga' => 18000, 'best' => 1],
    ['nama' => 'Ayam Goreng Lalapan + Nasi', 'harga' => 23000, 'best' => 0],
    ['nama' => 'Ati Ampela', 'harga' => 5000, 'best' => 0],
    ['nama' => 'Telur Puyuh', 'harga' => 5000, 'best' => 0],
    ['nama' => 'Kepala Ayam', 'harga' => 3500, 'best' => 0],
    ['nama' => 'Telur Rebus', 'harga' => 3500, 'best' => 0],
    ['nama' => 'Tahu', 'harga' => 1500, 'best' => 0],
    ['nama' => 'Ceker ayam', 'harga' => 1500, 'best' => 0],
    ['nama' => 'Nasi', 'harga' => 5000, 'best' => 0],
    ['nama' => 'Teh Manis Panas/Dingin', 'harga' => 5000, 'best' => 0],
    ['nama' => 'Teh Tawar Panas/Dingin', 'harga' => 4000, 'best' => 0],
    ['nama' => 'Jeruk Manis Panas/Dingin', 'harga' => 6000, 'best' => 0],
    ['nama' => 'Kopi', 'harga' => 5000, 'best' => 0],
    ['nama' => 'Air Mineral 600ml', 'harga' => 5000, 'best' => 0],
];

try {
    $db = Database::getInstance()->getConnection();
    
    // Clear existing menus for fresh start (optional, but good for demo)
    // $db->exec("DELETE FROM menus"); 
    
    $stmt = $db->prepare("INSERT INTO menus (nama, harga_jual, is_best_seller) VALUES (?, ?, ?)");
    
    $count = 0;
    foreach ($menus as $m) {
        // Check if exists
        $check = $db->prepare("SELECT id FROM menus WHERE nama = ?");
        $check->execute([$m['nama']]);
        if (!$check->fetch()) {
            $stmt->execute([$m['nama'], $m['harga'], $m['best']]);
            $count++;
        }
    }
    
    echo "Successfully imported $count new menu items!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

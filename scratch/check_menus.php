<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once 'config/database.php';
$db = Database::getInstance()->getConnection();
$stmt = $db->query('SELECT id, nama, kategori FROM menus');
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $r) {
    echo "ID: {$r['id']} | Name: {$r['nama']} | Category: {$r['kategori']}\n";
}

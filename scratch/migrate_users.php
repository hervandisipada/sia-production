<?php
$_SERVER['HTTP_HOST'] = 'localhost';
require_once __DIR__ . '/../config/database.php';
$db = Database::getInstance()->getConnection();
try {
    $db->exec("ALTER TABLE users ADD COLUMN status VARCHAR(20) DEFAULT 'active' AFTER role");
    // Set existing users to active
    $db->exec("UPDATE users SET status = 'active' WHERE status IS NULL OR status = ''");
    echo "Migration successful: status column added to users table.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

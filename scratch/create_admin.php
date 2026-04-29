<?php
require_once 'config/database.php';
$db = Database::getInstance()->getConnection();
$email = 'admin@admin.com';
$password = password_hash('admin123', PASSWORD_BCRYPT);
$name = 'Super Admin';
$role = 'admin';

$stmt = $db->prepare("DELETE FROM users WHERE email = ?");
$stmt->execute([$email]);

$stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
if ($stmt->execute([$name, $email, $password, $role])) {
    echo "User created successfully with password: admin123\n";
} else {
    echo "Failed to create user.\n";
}

<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'sia_pawon';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create Database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database `$db` checked/created.\n";

    $pdo->exec("USE `$db` "); 

    // We re-connect with DB selected
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Materials Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS materials (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        unit VARCHAR(50) NOT NULL,
        price_per_unit DECIMAL(15, 2) DEFAULT 0,
        stock DECIMAL(15, 2) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Table `materials` checked/created.\n";

    // 2. Menus Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS menus (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(15, 2) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Table `menus` checked/created.\n";

    // 3. Recipes Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS recipes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        menu_id INT NOT NULL,
        material_id INT NOT NULL,
        quantity_needed DECIMAL(15, 4) NOT NULL,
        FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
        FOREIGN KEY (material_id) REFERENCES materials(id) ON DELETE CASCADE
    )");
    echo "Table `recipes` checked/created.\n";

    // 4. Productions Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS productions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        status ENUM('planned', 'processing', 'done', 'canceled') DEFAULT 'planned',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Table `productions` checked/created.\n";

    // 5. Production Items
    $pdo->exec("CREATE TABLE IF NOT EXISTS production_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        production_id INT NOT NULL,
        menu_id INT NOT NULL,
        planned_qty INT NOT NULL,
        hpp_per_item DECIMAL(15, 2) DEFAULT 0,
        FOREIGN KEY (production_id) REFERENCES productions(id) ON DELETE CASCADE,
        FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE
    )");
    echo "Table `production_items` checked/created.\n";

    // 6. Production QC
    $pdo->exec("CREATE TABLE IF NOT EXISTS production_qc (
        id INT AUTO_INCREMENT PRIMARY KEY,
        production_item_id INT NOT NULL,
        good_qty INT DEFAULT 0,
        bad_qty INT DEFAULT 0,
        action_for_bad VARCHAR(255),
        FOREIGN KEY (production_item_id) REFERENCES production_items(id) ON DELETE CASCADE
    )");
    echo "Table `production_qc` checked/created.\n";

    // 7. Purchases
    $pdo->exec("CREATE TABLE IF NOT EXISTS purchases (
        id INT AUTO_INCREMENT PRIMARY KEY,
        material_id INT NOT NULL,
        date DATE NOT NULL,
        qty DECIMAL(15, 2) NOT NULL,
        total_cost DECIMAL(15, 2) NOT NULL,
        FOREIGN KEY (material_id) REFERENCES materials(id) ON DELETE CASCADE
    )");
    echo "Table `purchases` checked/created.\n";

    echo "\nMigration successful!\n";

} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}

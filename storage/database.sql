CREATE DATABASE IF NOT EXISTS rm_pawon;

USE rm_pawon;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('owner', 'admin', 'kasir') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS menus (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    harga_jual DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS bahan_baku (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    stok DECIMAL(10,2) DEFAULT 0,
    satuan VARCHAR(20),
    harga_per_unit DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS resep (
    id INT PRIMARY KEY AUTO_INCREMENT,
    menu_id INT,
    bahan_id INT,
    qty DECIMAL(10,2),
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
    FOREIGN KEY (bahan_id) REFERENCES bahan_baku(id)
);

CREATE TABLE IF NOT EXISTS produksi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tanggal DATE,
    menu_id INT,
    jumlah_rencana INT,
    status ENUM('perencanaan', 'produksi', 'selesai') DEFAULT 'perencanaan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (menu_id) REFERENCES menus(id)
);

CREATE TABLE IF NOT EXISTS produksi_detail (
    id INT PRIMARY KEY AUTO_INCREMENT,
    produksi_id INT,
    bahan_id INT,
    qty_terpakai DECIMAL(10,2),
    FOREIGN KEY (produksi_id) REFERENCES produksi(id),
    FOREIGN KEY (bahan_id) REFERENCES bahan_baku(id)
);

CREATE TABLE IF NOT EXISTS qc (
    id INT PRIMARY KEY AUTO_INCREMENT,
    produksi_id INT,
    jumlah_baik INT,
    jumlah_rusak INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produksi_id) REFERENCES produksi(id)
);

-- Insert default user (password: admin123)
INSERT IGNORE INTO users (id, name, email, password, role) VALUES 
(1, 'Owner RM', 'owner@rmpawon.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'owner'),
(2, 'Admin Dapur', 'admin@rmpawon.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

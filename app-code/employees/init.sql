CREATE DATABASE IF NOT EXISTS hmisphp;
USE hmisphp;

-- Table pour la connexion
CREATE TABLE IF NOT EXISTS logintab (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Table pour les employés
CREATE TABLE IF NOT EXISTS employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    salary VARCHAR(50),
    dob DATE
);

-- Insertion de l'admin par défaut
INSERT INTO logintab (user_name, password) VALUES ('admin', 'admin123');
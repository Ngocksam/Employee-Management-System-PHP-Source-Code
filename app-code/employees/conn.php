<?php
// On utilise "mysql" car c'est le nom de ton service Kubernetes définit dans tes fichiers YAML
$servername = "mysql"; 
$username = "root";
$password = "password"; // Le mot de passe définit dans ton infra-gitops
$database = "hmisphp"; // Le nom de la base de données que nous avons créée

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$servername = "mysql"; // On utilise le nom du service Kubernetes
$username = "root";
$password = "password";
$database = "hmisphp";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
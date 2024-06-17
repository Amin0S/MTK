<?php
// specific_php_file.php

$host = 'localhost'; // Database host
$dbname = 'your_database_name'; // Database name
$user = 'your_username'; // Database username
$password = 'your_password'; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Use $pdo to execute queries or perform database operations
?>

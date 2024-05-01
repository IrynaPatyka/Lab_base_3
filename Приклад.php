<?php
$dsn = "mysql:host=localhost:8889;dbname=car_firm";
$username = "root";
$password = "root"; 

try {
    $dbConnection = new PDO($dsn, $username, $password);
    echo "Підключено!";
} catch(PDOException $e) {
    echo $e->getMessage(); 
    exit;
}
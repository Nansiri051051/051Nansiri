<?php
// config.php
$host = 'localhost'; 
$database = 'online_shop'; 
$username = 'root';        
$password = '';            

$dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $username, $password, $options); // <<< ตัวแปรที่ถูกต้องคือ $pdo
} catch (\PDOException $e) {
     die("Connection failed: " . $e->getMessage()); 
}
?>
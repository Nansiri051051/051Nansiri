<?php
// connect database ด้วย mysqli
$host = "localhost";
$username = "root";
$password = "";
$database = "bd68s_product";

$dns = "mysql:host=$host;dbname=$database";









try {

    $conn = new PDO(dsn: $dsn , username: $username,password: $password);

    $conn->setAttribute(attribute: PDO::ATTR_ERRMODE,value: PDO::ERRMODE_EXCEPTION);
    echo "PDO Connected successfully";
}catch(PDOException $e){
    echo "Connected failed: " , $e->getMessage();
}

?> 
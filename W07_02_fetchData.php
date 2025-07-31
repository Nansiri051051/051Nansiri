<?php

require_once 'W07_01_connectDB.php';

$sql = "SELECT * FROM products";

$result = $conn->query($aql);

if ($result->rowCount() > 0) {
    // output data of each row
    echo "<h2>พบ ข้อมูลในตาราง  Product</h2>";

    $data = $result->fetchAll(PDO::FETCH_NUM);
    

} else {
    echo "<h2>ไม่พบข้อมูลในตาราง Product</h2>";
}

?>
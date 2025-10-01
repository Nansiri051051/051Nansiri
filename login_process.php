<?php
// login_process.php (DEBUGGING MODE - PROVE FAILURE)
session_start();
require_once 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['username']); 
    $password = $_POST['password'];

    try {
        $sql = "SELECT user_id, password, role FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        $is_login_successful = false;
        
        if ($user) {
            $db_password = $user['password'];

            // 1. ตรวจสอบรหัสผ่าน: ใช้ password_verify() (สำหรับบัญชีใหม่ที่ถูก hash)
            if (password_verify($password, $db_password)) {
                $is_login_successful = true;
            } 
            // 2. ตรวจสอบแบบ Plain Text (สำหรับบัญชี admin1/admin_pass เดิม)
            // บัญชี admin1 ควรจะผ่านตรงนี้ 
            elseif ($password === $db_password) { 
                $is_login_successful = true;
            }
        }

        if ($is_login_successful) {
            // ล็อกอินสำเร็จ: แสดงข้อความยืนยัน!
            die("SUCCESS! You have logged in as: " . $username); // <<< ถ้าผ่านจะเห็นข้อความนี้
        } else {
            // ล็อกอินไม่สำเร็จ: แสดงข้อความผิดพลาด!
            // <<< ถ้าโค้ดถึงตรงนี้ แสดงว่ารหัสผ่านไม่ตรงแน่นอน
            die("FAILURE: Invalid Username or Password (Logic Check Failed)."); 
        }

    } catch (PDOException $e) {
        die("Login Query Error: " . $e->getMessage());
    }
} else {
    // ถ้าเข้าไฟล์นี้โดยตรง
    die("ERROR: Access Denied. Use POST method from login.php.");
}
?>
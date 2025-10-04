<?php
session_start();
require_once 'config.php'; 

$error = '';
$username = ''; 

// โค้ดสำหรับประมวลผลการ Login เมื่อมีการกดปุ่ม POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    if (empty($username) || empty($password)) {
        $error = "กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ครบถ้วน";
    } else {
        try {
            $stmt = $conn->prepare("SELECT user_id, username, password, role FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // ตรวจสอบรหัสผ่านที่ถูกเข้ารหัส
            if ($user && password_verify($password, $user['password'])) {
                
                // Login สำเร็จ: สร้าง Session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // ส่งผู้ใช้ไปหน้าหลัก
                header("Location: /051/index.php"); 
                exit();
                
            } else {
                $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
            }
        } catch (PDOException $e) {
            $error = "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล";
        }
    }
}
?>
<!DOCTYPE html> 
<html lang="th"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>เข้าสู่ระบบ</title> 
<style> 
body { 
margin: 0; 
padding: 0; 
font-family: "Tahoma", sans-serif; 
/* *** สีชมพูสำหรับพื้นหลัง (เต็มจอ) *** */
background-color: #ff006aff;  
display: flex; 
justify-content: center; 
align-items: center; 
height: 100vh; 
} 

.login-box { 
background: #ff9bc1ff; 
border-radius: 10px; 
box-shadow: 0 4px 15px rgba(255, 1, 162, 0.8); /* เงาสีชมพูชัดขึ้น */
width: 320px; 
padding: 35px; /* เพิ่ม Padding ให้ดูใหญ่ขึ้น */
text-align: center; 
} 

.login-box h2 { 
margin-bottom: 25px; 
color: #ff006aff;  
} 
    
    .error-message {
        color: #d9534f; 
        margin-bottom: 15px;
        font-weight: bold;
    }

.login-box input[type="text"], 
.login-box input[type="password"] { 
display: block; 
width: 100%; 
font-size: 16px; 
padding: 10px; 
margin: 10px 0; 
/* *** กรอบ Input สีชมพู *** */
border: 1px solid #ff006aff; 
border-radius: 5px; 
outline: none; 
box-sizing: border-box;  
} 

.login-box button { 
width: 100%; 
/* *** ปุ่ม Submit สีชมพูเข้ม *** */
padding: 10px; 
background-color: #ff006aff; 
border: none; 
border-radius: 5px; 
color: white; 
font-size: 16px; 
cursor: pointer; 
margin-top: 10px; 
transition: background 0.3s ease; 
} 
    .login-box button:hover {
        background-color: #cc0055;
    }

.login-box .register-btn { 
/* *** ปุ่มสมัครสมาชิกสีชมพูอ่อน *** */
background-color: #fc7eb3ff;  
margin-top: 15px; 
      color: white; 
} 

</style> 
</head> 
<body> 
<div class="login-box"> 
<h2>𝕎𝕖𝕝𝕔𝕠𝕞𝕖</h2> 
    
    <?php if ($error): ?>
        <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

<form action="/051/login.php" method="POST"> 
 <input type="text" name="username" placeholder="ชื่อผู้ใช้หรืออีเมล" required 
               value="<?= htmlspecialchars($username) ?>"> 
 <input type="password" name="password" placeholder="รหัสผ่าน" required> 
 <button type="submit">เข้าสู่ระบบ</button> 
 </form> 

<form action="/051/register.php" method="GET"> <button type="submit" class="register-btn">สมัครสมาชิก</button> 
</form> 
</div> 
</body> 
</html>
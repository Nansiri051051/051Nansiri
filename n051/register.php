<?php
    require_once 'config.php';
    $error = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $no = trim($_POST['no']);
        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $tel = trim($_POST['tel']);
        $age = trim($_POST['age']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if(empty($username)||empty($fullname)||empty($email)||empty($password)||empty($confirm_password)||empty($age)){
            $error[]= "กรุณากรอกข้อมูลให้ครบทุกช่อง";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "กรุณากรอกอีเมลให้ถูกต้อง";
        } elseif ($password !== $confirm_password) {
            $error[] = "รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน";
        } elseif (!is_numeric($age) || $age < 1) {
            $error[] = "กรุณากรอกอายุที่ถูกต้อง";
        } else {
            $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username,  $email]);

            if($stmt->rowCount() > 0){
                $error[] = "ชื่อผู้ใช้หรืออีเมลนี้ถูกใช้ไปแล้ว";
            }
        }

        if (empty($error)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users(username, full_name, email, password, age, role) VALUES (?, ?, ?, ?, ?, 'member')";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $fullname, $email, $hashedPassword, $age]);
            
            header("Location: login.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-primary">
                        <ul>
                            <?php foreach ($error as $e): ?>
                                <li><?= htmlspecialchars($e) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>เพิ่มข้อมูลนักศึกษา</h2>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">รหัสนักศึกษา</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="รหัสนักศึกษา">
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="ชื่อ-สกุล">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="อีเมล">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">อายุ</label>
                                <input type="number" name="age" id="age" class="form-control" placeholder="อายุ">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                <a href="login.php" class="btn btn-link text-primary">เข้าสู่ระบบ</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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
      background-color: #87CEFA; /* พื้นหลังสีฟ้า */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 320px;
      padding: 30px;
      text-align: center;
    }

    .login-box h2 {
      margin-bottom: 20px;
      color: #1E90FF; /* ฟ้าเข้ม */
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      display: block;
      width: 100%;
      font-size: 16px;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #1E90FF;
      border-radius: 5px;
      outline: none;
      box-sizing: border-box; /* ทำให้ขนาดช่องตรงกัน */
    }

    .login-box input[type="text"]:focus,
    .login-box input[type="password"]:focus {
      border-color: #4682B4;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background-color: #1E90FF;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.3s ease;
    }

    .login-box button:hover {
      background-color: #4682B4;
    }

    .login-box .register-btn {
      background-color: #00BFFF; /* ปุ่มสมัครสมาชิกฟ้าอ่อน */
      margin-top: 15px;
    }

    .login-box .register-btn:hover {
      background-color: #1E90FF; /* hover เป็นฟ้าเข้ม */
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>เข้าสู่ระบบ</h2>
    <p>ยินดีต้อนรับ</p>
    <form action="login_process.php" method="post">
      <input type="text" name="username" placeholder="ชื่อผู้ใช้หรืออีเมล" required>
      <input type="password" name="password" placeholder="รหัสผ่าน" required>
      <button type="submit">เข้าสู่ระบบ</button>
    </form>
    <form action="register.php" method="get">
      <button type="submit" class="register-btn">สมัครสมาชิก</button>
    </form>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
</head>
<body>
    <h1>ยินดีต้อนรับเข้าสู่หน้าหลัก</h1>
    <p>ผู้ใช้: <?= htmlspecialchars($_SESSION['username']) ?> (<?= $_SESSION['role'] ?>)</p>

    <a href="logout.php"></a>
    <div></div>
    </body
</html>
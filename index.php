<?php
session_start();
require_once 'config.php';
$isLoggedIn = isset($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าหลัก</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e6fffa 0%, #f0fdfa 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .welcome-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 2.5rem;
      text-align: center;
      max-width: 450px;
      width: 100%;
      border: 1px solid #d1fae5;
    }

    h1 {
      color: #0f766e;
      font-weight: 600;
      font-size: 2rem;
      margin-bottom: 1.5rem;
    }

    .user-info {
      background: linear-gradient(135deg, #99f6e4 0%, #5eead4 100%);
      color: #064e3b;
      padding: 1.2rem;
      border-radius: 8px;
      margin: 1.5rem 0;
      border-left: 4px solid #0d9488;
    }

    .user-info p {
      margin: 0;
      font-size: 1.1rem;
      font-weight: 500;
    }

    .user-icon {
      font-size: 2.5rem;
      color: #0d9488;
      margin-bottom: 1rem;
    }

    .btn-logout {
      background: #0d9488;
      border: none;
      padding: 10px 24px;
      border-radius: 6px;
      color: white;
      font-weight: 500;
      font-size: 1rem;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-logout:hover {
      background: #0f766e;
      color: white;
    }

    .welcome-text {
      color: #6b7280;
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
      .welcome-card {
        padding: 2rem;
        margin: 1rem;
      }

      h1 {
        font-size: 1.8rem;
      }

      .user-info p {
        font-size: 1rem;
    }
    }
</style>
</head>
<body class="container mt-4">
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4" >
    <h1>รายการสินค้า</h1>
            <div>


<!-- รายการสินค้าที่ต้องการแสดง -->
                <div class="row">
                    <?php foreach ($products as $pd): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($แสดงชื่อหมวดหมู่จากdb)
                                    ?></h6>
                                    <p class="card-text"><?= nl2br(htmlspecialchars($product['description'])) ?> </p>
                                    <p><strong>รำนคำ:</strong> <?= number_format($product['price'], 2) ?> บาท</p>
                                    <?php if ($isLoggedIn): ?>
                                        <form action="cart.php" method="post" class="d-inline">
                                            <input type="hidden" name="product_id" value="<?= $รหัสสินค้า?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-sm btn-success">เพิ่มในตะกร ้ำ</button>
                                        </form>
                                    <?php else: ?>
                                        <small class="text-muted">เข้าสู่ระบบเพื่อสั่งซื้อ </small>
                                    <?php endif; ?>
                                    <a href="product_detail.php?id=<?= $รหัสสินค้า?>" class="btn btn-sm btn-outline-primary floatend">ดูรายละเอียด</a>
                                    </div>
                                    </div>
                                    </div>
                                    <?php endforeach; ?>
                                    </div>
</body>

        <?php
        if($isLoggedIn): ?>
        <span class="me-3">ยินดีต้อนรับ, <?= htmlspecialchars($_SESSION['username']) ?> (<?=
            $_SESSION['role'] ?>)</span>
            <a href="profile.php" class="btn btn-info">ข้อมูลส่วนตัว</a>
            <a href="cart.php" class="btn btn-warning">ดูตะกร้า</a>
            <a href="logout.php" class="btn btn-secondary">ออกจากระบบ</a>
            <?php else: ?>
            <a href="login.php" class="btn btn-success">เข้าสู่ระบบ</a>
            <a href="register.php" class="btn btn-primary">สมัครสมาชิก</a>
        <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

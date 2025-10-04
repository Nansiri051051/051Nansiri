<?php
session_start();
require 'config.php';
// ตรวจสอบกำรล็อกอิน
if (!isset($_SESSION['user_id'])) { // TODO: ใส่ session ของ user
header("Location: login.php"); // TODO: หน้ำ login
exit;
}
$user_id = $_SESSION['user_id']; // TODO: กำหนด user_id


// ดงึรำยกำรสนิ คำ้ในตะกรำ้
$stmt = $conn->prepare("SELECT cart.cart_id, cart.quantity, cart.product_id, 
                            products.product_name, products.price
                        FROM cart
                        JOIN products ON cart.product_id = products.product_id
                        WHERE cart.user_id = ?");
$stmt->execute([$user_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>สั่งซอื้ สนิ คำ้</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>ยนื ยันกำรสั่งซอื้ </h2>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
<ul>
<?php foreach ($errors as $e): ?>
<li><?= htmlspecialchars($e) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<!-- แสดงรำยกำรสนิ คำ้ในตะกรำ้ -->
<h5>รำยกำรสนิ คำ้ในตะกรำ้</h5>
<ul class="list-group mb-4">
<?php foreach ($items as $item): ?>
<li class="list-group-item">
<?= htmlspecialchars($item['product_name']) ?> × <?= $item['quantity'] ?> = <?=
number_format($item['price'] * $item['quantity'], 2) ?> บำท
<!-- TODO: product_name, quantity, price -->
</li>
<?php endforeach; ?>
<li class="list-group-item text-end"><strong>รวมทัง้สนิ้ : <?= number_format($total, 2) ?> บำท</strong></li>
</ul>
<!-- ฟอรม์ กรอกขอ้ มลู กำรจัดสง่ -->
<form method="post" class="row g-3">
<div class="col-md-6">
<label for="address" class="form-label">ที่อยู่</label>
<input type="text" name="address" id="address" class="form-control" required>
</div>
<div class="col-md-4">
<label for="city" class="form-label">จังหวัด</label>
<input type="text" name="city" id="city" class="form-control" required>
</div>
<div class="col-md-2">
<label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
<input type="text" name="postal_code" id="postal_code" class="form-control" required>
</div>
<div class="col-md-6">
<label for="phone" class="form-label">เบอรโ์ ทรศัพท</label> ์
<input type="text" name="phone" id="phone" class="form-control" required>
</div>
<div class="col-12">
<button type="submit" class="btn btn-success">ยนื ยันกำรสั่งซอื้ </button>
<a href="________.php" class="btn btn-secondary">← กลับตะกร ้ำ</a> <!-- TODO: หน้ำ cart -->
</div>
</form>
</body>
</html>

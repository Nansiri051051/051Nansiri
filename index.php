<?php
// index.php
session_start(); // <<< ต้องมี session_start()
require_once 'config.php'; 
require_once 'admin/auth_admin.php'; // <<< ต้องระบุโฟลเดอร์

// ... (โค้ด query ข้อมูลอื่นๆ ถ้ามี) ...

?>
<body>
    <div class="container mt-4">
        <h2>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Guest'); ?></h2>
        
        </div>
</body>
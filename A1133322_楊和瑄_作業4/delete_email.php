<?php
// 連接 XAMPP 的 MySQL 資料庫
$conn = new mysqli("localhost", "root", "", "mail_system");

// 檢查連線是否失敗
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (!empty($email)) {
        // 使用預備陳述式 (Prepared Statement) 確保安全
        $stmt = $conn->prepare("DELETE FROM receivers WHERE email = ?");
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            echo "<script>alert('🗑️ 該郵務位址已成功自卷宗抹除！'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('❌ 抹除失敗，請稍後再試。'); window.location.href='index.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('❌ 參數錯誤。'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
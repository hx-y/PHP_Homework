<?php
// 連接 XAMPP 的 MySQL 資料庫
$conn = new mysqli("localhost", "root", "", "mail_system");

// 檢查連線是否失敗
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // 檢查防呆：確保欄位不是空的且格式正確
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // 預防資料重複插入，使用 INSERT IGNORE 或是進行判斷
        $sql = "INSERT INTO receivers (email) VALUES ('$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('🎉 Email 成功新增至資料庫！'); window.location.href='index.php';</script>";
        } else {
            // 這裡通常是因為資料庫設定了 UNIQUE，代表 Email 重複了
            echo "<script>alert('⚠️ 此 Email 已經存在於資料庫中囉！'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('❌ 格式錯誤，請輸入正確的 Email。'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
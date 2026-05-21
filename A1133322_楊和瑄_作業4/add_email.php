<?php
// 連接 XAMPP 的 MySQL 資料庫
$conn = new mysqli("localhost", "root", "", "mail_system");

// 檢查連線是否失敗
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // 檢查防呆：確保欄位不是空的且格式正確
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // 先檢查此 Email 是否已經存在
        $check_stmt = $conn->prepare("SELECT email FROM receivers WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows > 0) {
            echo "<script>alert('⚠️ 此 Email 已經存在於資料庫中囉！'); window.location.href='index.php';</script>";
        } else {
            // 不重複才進行插入
            $insert_stmt = $conn->prepare("INSERT INTO receivers (email) VALUES (?)");
            $insert_stmt->bind_param("s", $email);
            
            if ($insert_stmt->execute()) {
                echo "<script>alert('🎉 Email 成功新增至資料庫！'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('❌ 新增失敗，請稍後再試。'); window.location.href='index.php';</script>";
            }
            $insert_stmt->close();
        }
        $check_stmt->close();
    } else {
        echo "<script>alert('❌ 格式錯誤，請輸入正確的 Email。'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
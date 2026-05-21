<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>系統發送狀態</title>
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="card shadow p-4">
        <h2 class="mb-4">📊 垃圾郵件發送進度與紀錄</h2>
        <hr>

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // 1. 連接資料庫
        $conn = new mysqli("localhost", "root", "", "mail_system");
        if ($conn->connect_error) { die("資料庫連線失敗: " . $conn->connect_error); }

        $subject   = $_POST['subject'];
        $message   = $_POST['message'];
        $send_mode = $_POST['send_mode'];

        // 2. 判斷發送模式（全部、隨機、或單一收件者）
        if ($send_mode === "all") {
            $sql = "SELECT email FROM receivers";
            $result = $conn->query($sql);
            $total_emails = $result->num_rows;

            $email_list = [];
            while ($row = $result->fetch_assoc()) {
                $email_list[] = $row['email'];
            }
        } elseif ($send_mode === "random") {
            $limit = intval($_POST['random_count']);
            $sql = "SELECT email FROM receivers ORDER BY RAND() LIMIT $limit";
            $result = $conn->query($sql);
            $total_emails = $result->num_rows;

            $email_list = [];
            while ($row = $result->fetch_assoc()) {
                $email_list[] = $row['email'];
            }
        } else {
            // 單一發送模式：直接使用前端傳過來的單一 Email，不需要撈資料庫
            $single_email = $_POST['single_email'];
            $email_list = [$single_email];
            $total_emails = 1;
        }

        if ($total_emails > 0) {
            // --- 功能 B-3: 顯示寄送進度基礎外殼與進度條 ---
            echo "<div class='mb-4'>";
            echo "  <h5>正在發送中... <span id='progress-text' class='fw-bold text-primary'>0 / $total_emails</span></h5>";
            echo "  <div class='progress' style='height: 25px;'>";
            echo "    <div id='progress-bar' class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width: 0%'>0%</div>";
            echo "  </div>";
            echo "</div>";
            echo "<div class='list-group' id='log-box'>"; 

            // 3. 初始化 PHPMailer 設定
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'a0923305250@gmail.com'; 
            $mail->Password   = 'rvacmldslkjmaiey';    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->CharSet    = 'UTF-8';

            // Mac 環境 XAMPP 安全憑證解鎖
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('a0923305250@gmail.com', '垃圾郵件寄送系統');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($message);

            $sent_count = 0; 

            // 4. 開始依序發信，並使用 JavaScript 動態更新畫面
            foreach ($email_list as $target_email) {
                $sent_count++;
                $percentage = round(($sent_count / $total_emails) * 100);

                try {
                    $mail->clearAddresses(); 
                    $mail->addAddress($target_email);
                    $mail->send();

                    echo "<script>
                        document.getElementById('progress-text').innerHTML = '$sent_count / $total_emails';
                        document.getElementById('progress-bar').style.width = '$percentage%';
                        document.getElementById('progress-bar').innerHTML = '$percentage%';
                        document.getElementById('log-box').innerHTML += '<div class=\"list-group-item list-group-item-success\">✅ [$sent_count/$total_emails] 成功寄送至：$target_email</div>';
                    </script>";

                } catch (Exception $e) {
                    echo "<script>
                        document.getElementById('log-box').innerHTML += '<div class=\"list-group-item list-group-item-danger\">❌ [$sent_count/$total_emails] 失敗：$target_email (錯誤原因: {$mail->ErrorInfo})</div>';
                    </script>";
                }

                flush();
                ob_flush();
            }

            echo "</div>"; 
            echo "<div class='alert alert-success mt-4'>🎉 這波寄送任務已全部執行完畢！</div>";

        } else {
            echo "<div class='alert alert-warning'>目前資料庫內空空如也，且未指定單一收件者，請先回首頁。</div>";
        }

        $conn->close();
        ?>

        <div class="mt-4">
            <a href="index.php" class="btn btn-outline-dark">⬅️ 返回主控制台</a>
        </div>
    </div>
</div>
</body>
</html>
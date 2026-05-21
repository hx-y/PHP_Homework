<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時光書簡 - 郵件發送誌</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@400;700&family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    
    <style>
        /* 核心 CSS 設定 */
        body { 
            background-color: #f4f0ea; 
            color: #3a3530; 
            font-family: 'Noto Serif TC', serif; 
            letter-spacing: 0.05em; 
            padding: 60px 0;
        }
        
        /* 大標題 */
        .vintage-title {
            font-family: 'Playfair Display', 'Noto Serif TC', serif;
            font-weight: 700;
            color: #2b4c3f; 
            border-bottom: 2px solid #d3c7b5;
            display: inline-block;
            padding-bottom: 15px;
        }

        .vintage-subtitle {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: #8c7b64;
            font-size: 1.1rem;
        }

        /* 卡片外觀 */
        .vintage-card { 
            background-color: #faf8f5; 
            border: 1px solid #dcd1c4; 
            border-radius: 4px; 
            box-shadow: 0 4px 20px rgba(58,53,48,0.04); 
            transition: transform 0.3s ease;
        }
        .vintage-card:hover {
            transform: translateY(-2px); 
        }

        /* 輸入框 */
        .form-control {
            background-color: #faf8f5;
            border: 1px solid #c8bca6;
            border-radius: 2px;
            color: #3a3530;
            font-family: 'Noto Serif TC', serif;
        }
        .form-control:focus {
            background-color: #ffffff;
            border-color: #2b4c3f;
            box-shadow: 0 0 0 0.25rem rgba(43,76,63,0.1);
        }

        /* 按鈕 */
        .btn-vintage-green {
            background-color: #2b4c3f;
            color: #faf8f5;
            border-radius: 2px;
            border: none;
            font-weight: 700;
        }
        .btn-vintage-green:hover {
            background-color: #1e362c;
            color: #ffffff;
        }

        .btn-vintage-brown {
            background-color: #614e43;
            color: #faf8f5;
            border-radius: 2px;
            border: none;
            font-weight: 700;
        }
        .btn-vintage-brown:hover {
            background-color: #4a3b32;
            color: #ffffff;
        }

        /* 虛線 */
        hr {
            border-top: 1px dashed #c8bca6;
            opacity: 0.6;
        }

        /* 發送模式區塊美化 */
        .mode-container {
            border: 1px solid #dcd1c4;
            background-color: #fcfbfa;
        }

        /* 標籤 */
        .badge-vintage {
            background-color: #c5a880;
            color: #ffffff;
            font-weight: normal;
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="text-center mb-5">
        <h1 class="vintage-title">時光書簡 ‧ 郵件郵務誌</h1>
        <div class="vintage-subtitle mt-2">— The Art of Literary Dispatch —</div>
    </div>

    <div class="row g-5 justify-content-center">
        <div class="col-lg-4 col-md-5">
            <div class="card vintage-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="m-0 fw-bold" style="color: #614e43;">📥 墨海集名</h4>
                    <span class="badge badge-vintage">功能 A</span>
                </div>
                <p class="text-muted small lh-lg">於此處謄寫新的郵務位址。系統將為您悉心載入卷宗，逐字築起您的字裡行間大軍。</p>
                <hr>
                
                <form action="add_email.php" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold small text-secondary">郵件位址 (Email)</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="username@example.com" required>
                    </div>
                    <button type="submit" class="btn btn-vintage-brown w-100 py-2">封存至卷宗</button>
                </form>

                <div class="mt-4 p-3 rounded" style="background-color: #f1ede6; border-left: 3px solid #c5a880;">
                    <h6 class="fw-bold mb-2 text-secondary" style="font-size: 0.9rem;">📜 卷宗總覽</h6>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "mail_system");
                    $result = $conn->query("SELECT COUNT(*) as total FROM receivers");
                    $row = $result->fetch_assoc();
                    echo "<p class='mb-0 small' style='color: #4a3b32;'>目前已收錄 <span class='fw-bold fs-5' style='color: #2b4c3f;'>" . $row['total'] . "</span> 筆名冊</p>";
                    $conn->close();
                    ?>

                    <button type="button" class="btn btn-sm btn-outline-secondary w-100 mt-1 small" data-bs-toggle="modal" data-bs-target="#emailListModal" style="font-size: 0.85rem; border-color: #c8bca6; color: #614e43;">
                        🔍 查閱並管理完整名冊
                    </button>

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-7">
            <div class="card vintage-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="m-0 fw-bold" style="color: #2b4c3f;">🚀 案頭遣字台</h4>
                    <span class="badge badge-vintage">功能 B</span>
                </div>
                <p class="text-muted small lh-lg">提筆落款，佈置您的信箋。準備好將帶著墨香的辭令捎向遠方的讀者。</p>
                <hr>
                
                <form action="send_mail.php" method="post">
                    
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold small text-secondary">書簡主旨 (Subject)</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="賦予這封信一個雋永的標題..." required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold small text-secondary">信箋內文 (Message / HTML)</label>
                        <textarea class="form-control" id="message" name="message" rows="6" placeholder="在此傾注您的隻字片語..." required></textarea>
                    </div>

                    <div class="mb-4 p-3 rounded mode-container">
                        <label class="form-label d-block fw-bold small text-secondary mb-3">🎯 挑選寄送魚雁之禮</label>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="send_mode" id="mode_all" value="all" checked onclick="switchMode('all')">
                            <label class="form-check-label small" for="mode_all">
                                <strong>1. 浩蕩投遞 (全部寄送)</strong> — 喚醒資料庫內全體讀者，進行遍地拂曉轟炸。
                            </label>
                        </div>
                        
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="send_mode" id="mode_random" value="random" onclick="switchMode('random')">
                            <label class="form-check-label small" for="mode_random">
                                <strong>2. 隨緣寄送 (隨機幾筆)</strong> — 挑選幾位被歲月眷顧的幸運知音。
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="send_mode" id="mode_single" value="single" onclick="switchMode('single')">
                            <label class="form-check-label small" for="mode_single">
                                <strong>3. 孤芳自賞 (指定單一郵務)</strong> — 精準捎信給特定的那一個人。
                            </label>
                        </div>

                        <div id="random_count_div" class="mt-3 ms-4" style="display: none;">
                            <label for="random_count" class="form-label small text-muted">指定隨緣發送之冊數：</label>
                            <div class="input-group input-group-sm w-50">
                                <input type="number" class="form-control" id="random_count" name="random_count" min="1" value="1">
                                <span class="input-group-text bg-transparent text-muted" style="border-color: #c8bca6;">封</span>
                            </div>
                        </div>

                        <div id="single_email_div" class="mt-3 ms-4" style="display: none;">
                            <label for="single_email" class="form-label small text-muted">請填入對方的郵務位址 (Email)：</label>
                            <input type="email" class="form-control form-control-sm w-75" id="single_email" name="single_email" placeholder="target@example.com">
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-vintage-green btn-lg py-2.5 fw-bold" style="font-size: 1.1rem;">🔥 揮毫遣信 ‧ 啟動發送</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="emailListModal" tabindex="-1" aria-labelledby="emailListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content vintage-card" style="background-color: #faf8f5;">
            <div class="modal-header" style="border-bottom: 1px dashed #c8bca6;">
                <h5 class="modal-title fw-bold text-secondary" id="emailListModalLabel">📜 墨海全名冊卷宗</h5>
                <button type="button" class="btn-close" data-bs-shadow="none" data-bs-skip="true" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="text-muted small">此處羅列目前已封存的所有名冊位址，您可以自由檢閱或進行抹除。</p>
                <div class="table-responsive">
                    <table class="table table-hover align-middle small" style="color: #3a3530;">
                        <thead style="background-color: #f1ede6; color: #614e43;">
                            <tr>
                                <th scope="col" style="width: 15%">序號</th>
                                <th scope="col" style="width: 65%">郵務位址 (Email)</th>
                                <th scope="col" style="width: 20%" class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "mail_system");
                            if (!$conn->connect_error) {
                                // 撈取所有收件者（假設你有包含自增 id，如果沒有，下方可以用變數 $idx 自增）
                                $result = $conn->query("SELECT * FROM receivers ORDER BY email ASC");
                                if ($result && $result->num_rows > 0) {
                                    $idx = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $idx++ . "</td>";
                                        echo "<td class='fw-medium'>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "<td class='text-center'>";
                                        // 刪除表單：透過 POST 把要刪除的 email 傳到 delete_email.php
                                        echo "  <form action='delete_email.php' method='post' onsubmit='return confirm(\"確定要將此位址從卷宗中抹除嗎？\");' style='margin:0;'>";
                                        echo "    <input type='hidden' name='email' value='" . htmlspecialchars($row['email']) . "'>";
                                        echo "    <button type='submit' class='btn btn-sm btn-outline-danger py-0 px-2' style='font-size:0.75rem;'>抹除</button>";
                                        echo "  </form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='text-center text-muted py-4'>目前卷宗內尚無任何名冊。</td></tr>";
                                }
                                $conn->close();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px dashed #c8bca6;">
                <button type="button" class="btn btn-sm btn-vintage-brown px-3 py-1.5" data-bs-dismiss="modal">關閉卷宗</button>
            </div>
        </div>
    </div>
</div>

<!-- 引入 Bootstrap 5 JS 驅動 Modal 功能 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
function switchMode(mode) {
    // 根據勾選的模式，決定哪一個輸入框要顯示、哪一個要隱藏
    document.getElementById('random_count_div').style.display = (mode === 'random') ? 'block' : 'none';
    document.getElementById('single_email_div').style.display = (mode === 'single') ? 'block' : 'none';
    
    // 防呆機制：只有在單人模式下，單人 Email 框才是「必填 (required)」
    document.getElementById('single_email').required = (mode === 'single');
}
</script>

</body>
</html>
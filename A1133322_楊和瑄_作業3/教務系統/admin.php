<?php
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login']=='admin'){
        echo"<h1>Welcome! Admin Login Success</h1></br>";
    }else{
        echo "<h1>非法進入網頁你會看不到東西!</h1>";
        header("Refresh:2;url=login.php");
        exit();
    }
}else{
    echo "<h1>非法進入網頁你會看不到東西!</h1>";
    header("Refresh:2;url=login.php");
    exit();
}
?>
<h2>⚙️ 教務系統後台 - 最高權限管理</h2>
<p>管理員模式 (Admin Mode)</p>
<hr>
<div style="background: #eee; padding: 10px;">
    <h3>系統功能清單：</h3>
    <button>➕ 新增使用者帳號</button>
    <button>❌ 刪除違規帳號</button>
    <button>📊 查看系統伺服器狀態</button>
    <button>📧 發送全校公告</button>
</div>
<br>
<a href="logout.php">登出系統</a>
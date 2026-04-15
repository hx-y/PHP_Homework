<?php
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login']=='student'){
        echo"<h1>Welcome! Student Login Success</h1></br>";
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
<h2>🎓 學生教務系統 - 個人專區</h2>
<p>歡迎同學！</p>
<hr>
<ul>
    <li><strong>我的成績查詢：</strong> 網頁程式設計 - 95分</li>
    <li><strong>選課系統：</strong> <a href="#">點我進入選課</a></li>
    <li><strong>出缺席紀錄：</strong> 正常</li>
</ul>
<br>
<a href="logout.php">登出系統</a>
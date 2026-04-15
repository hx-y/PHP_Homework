<?php
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login']=='teacher'){
        echo"<h1>Welcome! Teacher Login Success</h1></br>";
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
<h2>🍎 老師教務系統 - 教學管理</h2>
<p>老師您好，辛苦了！</p>
<hr>
<table border="1">
    <tr>
        <th>學生姓名</th>
        <th>平時成績</th>
        <th>期中成績</th>
        <th>操作</th>
    </tr>
    <tr>
        <td>某某</td>
        <td>90</td>
        <td>85</td>
        <td><button>修改成績</button></td>
    </tr>
</table>
<br>
<a href="logout.php">登出系統</a>
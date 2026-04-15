<?php
if(isset($_COOKIE['uName'])){
    echo $_COOKIE['uName']."歡迎回來～";
    echo "<a href='cookiedel.php'>COOKIE刪除</a>";
}
?>


<form action="logincheck.php" method="POST">
帳號:<input type="text" name="uID"><br>
密碼:<input type="password" name="uPWD"><br>
<input type="submit">
</form>
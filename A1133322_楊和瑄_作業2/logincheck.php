<?php
session_start();//啟動session

$fID="pnm";
$fPWD="123";
if(isset($_POST["uID"])&&isset($_POST["uPWD"])){
    $uID=$_POST["uID"];
    $uPWD=$_POST["uPWD"];

    if($fID==$uID&&$fPWD==$uPWD){
        $_SESSION["is_login"]=true;//跳轉到報名頁面
        header("Location:A1133322_楊和瑄_作業1.php");
    }else{
        echo "登入失敗，將於2秒後返回...";
        header("Refresh:2;url=login.php");
    }
}
?>
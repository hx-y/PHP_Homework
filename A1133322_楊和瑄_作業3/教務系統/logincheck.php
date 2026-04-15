<?php
session_start();

$aID="admin";
$aPWD="123456";

$sID="student";
$sPWD="123";

$tID="teacher";
$tPWD="456";

$date=strtotime("+20 day", time());

if(isset($_POST["uID"])&&isset($_POST["uPWD"])){
    $uID=$_POST["uID"];
    $uPWD=$_POST["uPWD"];
    
    if($uID==$aID&&$uPWD==$aPWD){
        $_SESSION['login']='admin';
        setcookie("uName",$uID,$date);
        header("Location:admin.php");

    }else if($uID==$sID&&$uPWD==$sPWD){
        $_SESSION['login']='student';
        setcookie("uName",$uID,$date);
        header("Location:student.php");

    }else if($uID==$tID&&$uPWD==$tPWD){
        $_SESSION['login']='teacher';
        setcookie("uName",$uID,$date);
        header("Location:teacher.php");

    }else{
        echo "登入失敗，將於2秒後返回...";
        header("Refresh:2;url=login.php");
    }
}
?>
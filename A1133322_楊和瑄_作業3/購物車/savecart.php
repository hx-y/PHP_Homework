<?php
session_start();

if(isset($_POST["Item"])) {
    $_SESSION["ID"]=$_POST["Item"];
    $_SESSION["Quantity"]=$_POST["Quantity"];

    $Item=$_SESSION["ID"];
    $Qty=$_SESSION["Quantity"];
    //拆出編號來當cookie索引
    $temp=explode(",",$Item);
    $ID=$temp[0];
    //存cookie
    setcookie("Cart[".$ID."]",$Item.",".$Qty,time()+3600);

    header("Location:shoppingcart.php");
}

?>
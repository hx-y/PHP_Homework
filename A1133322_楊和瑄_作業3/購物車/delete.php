<?php
if (isset($_GET["Id"])) {
    $id = $_GET["Id"];
    
    setcookie("Cart[".$id."]","",time()-3600);
    header("Location: shoppingcart.php");
}
?>
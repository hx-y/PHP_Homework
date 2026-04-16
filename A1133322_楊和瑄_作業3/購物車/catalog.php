<?php
session_start();
?>
<body bgcolor="orange">
    <form action="savecart.php" method="post">
    選擇商品：
    <select name="Item">
        <option value="S001,10吋平板電腦,12000">S001 10吋平板電腦 - $12000</option>
        <option value="S002,15.6吋筆記型電腦,27000">S002 15.6吋筆記型電腦 - $27000</option>
        <option value="S003,iPhone智慧型手機,21000">S003 iPhone智慧型手機 - $21000</option>
    </select>
    <input type="text" name="Quantity" value="1" size="5">
    <input type="submit" value="訂購">
</form>
<br>
<a href="catalog.php">商品目錄</a> | <a href="shoppingcart.php">檢視購物車</a>
</body>
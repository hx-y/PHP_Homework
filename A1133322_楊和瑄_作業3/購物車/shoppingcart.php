<body bgcolor="orange">
    <table border="1">
        <tr bgcolor="pink">
            <td>功能</td><td>編號</td><td>名稱</td><td>價格</td><td>數量</td>
        </tr>    
<?php
$total=0;
if(isset($_COOKIE["Cart"])) {
    foreach($_COOKIE["Cart"] as $id => $value) {
        $data = explode(",", $value); //拆開資料
        $price = $data[2];
        $quantity = $data[3];
        $subtotal = $price * $quantity;
        $total += $subtotal;
        
        echo "<tr bgcolor='pink'>";
        echo "<td><a href='delete.php?Id=".$id."'>刪除</a></td>";
        echo "<td>" . $data[0] . "</td>"; //編號
        echo "<td>" . $data[1] . "</td>"; //名稱
        echo "<td>" . $data[2] . "</td>"; //價格
        echo "<td>" . $data[3] . "</td>"; //數量
        echo "</tr>";
    }
}
?>
</table>
<p>總金額 = <?php echo $total; ?>元 </p>
<a href="catalog.php">商品目錄</a> | <a href="shoppingcart.php">檢視購物車</a>
</body>
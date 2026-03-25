<html>
<head>
    <title>2026 夏令營報名表</title>
</head>
<body bgcolor="#f4f7f6">

    <center>
        <h1><font color="#2980b9">🚀 2026 數位未來：AI 創意探索夏令營</font></h1>
        
        <?php
        // 簡單的 PHP：如果按鈕被按下，顯示歡迎詞
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            echo "<h3><font color='green'>✨ 感謝報名！" . $name . " 同學，我們已收到您的資料！</font></h3>";
        }
        ?>

        <p>
        <i>「在這個 AI 時代，想像力就是你的超能力！」</i><br>
        掌握未來的鑰匙，就在這三天的旅程中。
        </p>
    </center>

    <hr width="90%" color="#3498db">

    <h2><font color="brown">一、 學員基本資料</font></h2>
    
    <form action="" method="post">
        姓名：<input type="text" name="name" required><br><p>
        身分證：<input type="text" name="id_card"><br><p>
        出生日期：<input type="date" name="birthday"><br><p>
        電話：<input type="tel" name="phone"><br><p>
        通訊地址：<input type="text" name="address" size="50"><br><p>
        飲食習慣：
        <select name="food">
            <option value="meat">葷食</option>
            <option value="vege">素食</option>
        </select>
        
        <p>
        <h2><font color="brown">二、 緊急聯絡資訊</font></h2>
        聯絡人：<input type="text" name="emergency_name"><br><p>
        電話：<input type="tel" name="emergency_phone"><br><p>

        <input type="submit" value="點我送出報名表">
    </form>

    <hr width="90%">

    <h2><font color="navy">📅 三日活動日程表</font></h2>
    <table border="1" width="100%" bgcolor="white">
        <tr bgcolor="#3498db">
            <th><font color="white">時間</font></th>
            <th><font color="white">第一天</font></th>
            <th><font color="white">第二天</font></th>
            <th><font color="white">第三天</font></th>
        </tr>
        <tr>
            <td>09:00-12:00</td>
            <td>相見歡與 AI 介紹</td>
            <td>AI 繪圖實作</td>
            <td>專題發表會</td>
        </tr>
        <tr>
            <td bgcolor="#eeeeee">12:00-13:30</td>
            <td colspan="3" align="center">午餐與午睡休息</td>
        </tr>
        <tr>
            <td>13:30-17:00</td>
            <td>指令工程入門</td>
            <td>影片創作</td>
            <td>頒獎與結業</td>
        </tr>
    </table>

    <p align="center">
        <font size="2" color="gray">&copy; 2026 數位未來夏令營版權所有</font>
    </p>

</body>
</html>
<?php

$restdata = '****假設這裡是關於餐廳的各項資料****';

$menulist = '
a1, 排骨便當, 150, 老闆推薦
a2, 雞腿便當, 160, 必吃
a3, 魚排便當, 180, 吃過就忘不了

b1, 熱咖啡, 60, 中杯
b2, 冰紅茶, 40, 中杯

';


$a_menu = explode(PHP_EOL, $menulist);  // 使用 PHP_EOL 處理當前環境的換行符
$a_menu = array_filter($a_menu);  // 移除空白列

$data = <<< HEREDOC
    <form method="post" action="test2_x.php">
    <table border="1">
    <tr>
        <th>項目</th>
        <th>名稱</th>
        <th>單價</th>
        <th>備註</th>
        <th>勾選</th>
        <th>數量</th>
    </tr>
HEREDOC;
foreach($a_menu as $value) {
    $a_item = explode(',', $value);
    array_map('trim', $a_item);
    $f_code = $a_item[0];
    $f_name = $a_item[1];
    $f_price = $a_item[2];
    $f_note = $a_item[3];

    $data .= <<< HEREDOC
    <tr>
        <td>{$f_code}</td>
        <td>{$f_name}</td>
        <td>{$f_price}</td>
        <td>{$f_note}</td>
        <td><input type="checkbox" name="want[]" value="{$f_code}"></td>
        <td><input type="text" size="2" name="amt[{$f_code}]"></td>
    </tr>
HEREDOC;
}
$data .= <<< HEREDOC
</table>
<p>
自行計算總金額：<input type="text" name="total_price" required>
</p>
<p>
訂購人代號：<input type="text" name="membcode" required><br>
訂購人姓名：<input type="text" name="membname" required>
</p>
<br><input type="submit" value="送出">
</form>
HEREDOC;

$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ding Test</title>
</head>
<body>
    <h2>訂餐系統主要操作頁面測試</h2>
    <h3>顯示餐廳的資訊</h3>
    <div>{$restdata}</div>
    <h3>顯示菜單的資訊，可供輸入</h3>
    <div>
    {$data}
    </div>
</body>
</html>
HEREDOC;

echo $html;
?>
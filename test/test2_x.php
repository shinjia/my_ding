<?php

$total_price = $_POST['total_price'] ?? 0;
$membcode = $_POST['membcode'] ?? '';
$membname = $_POST['membname'] ?? '無名氏';
$a_want = $_POST['want'] ?? [];
$a_amt = $_POST['amt'] ?? [];

$data = '<ul>';
foreach($a_want as $value) {
    $data .= '<li>';
    $data .= '項目：' . $value;
    $data .= ' ===> 數量：' . $a_amt[$value];
    $data .= '</li>';
}
$data .= '</ul>';
$data .= '總金額：' . $total_price;

// 將此資料寫入指定的檔案內

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
    <h3>顯示訂購人的資訊</h3>
    <div>{$membcode} - {$membname}</div>
    <h3>顯示菜單的訂購資訊</h3>
    <div>
    {$data}
    </div>

    <p>※ 應將此資料寫入指定的檔案內</p>
</body>
</html>
HEREDOC;

echo $html;
?>
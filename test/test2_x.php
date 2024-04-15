<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$price_user = $_POST['price_user'] ?? 0;
$price_auto = $_POST['price_auto'] ?? 0;
$membcode = $_POST['membcode'] ?? '';
$membname = $_POST['membname'] ?? '無名氏';
$a_amt = $_POST['amt'] ?? [];
$a_note = $_POST['note'] ?? [];

$data = '<ul>';
foreach($a_amt as $key=>$value) {
    if($value!=0) {
        $data .= '<li>';
        $data .= '項目：' . $key;
        $data .= ' ===> 數量：' . $value;
        $data .= ' ===> 附註：' . $a_note[$key];
        $data .= '</li>';
    }
}
$data .= '</ul>';
$data .= '總金額(自動計算)：' . $price_auto;
$data .= '<br>';
$data .= '總金額(用戶輸入)：' . $price_user;

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
    <div>[{$membcode}] {$membname}</div>
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
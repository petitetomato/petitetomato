<?php
session_start();
//セッション情報を削除
unset($_SESSION['list']);
unset($_SESSION['customer']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="TomokoEto.css" rel="stylesheet">
<title>SweetsShopTomoko 予約完了</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
  </header>
<div class="cart_contents">
    <h2>ショッピングカート(3/3)</h2>
    <p>お買い上げありがとうございます。</p>
    <p><a href="index.php">はじめの画面に戻る</a></p>
</div>

</body>
</html>
<?php
session_start();
//セッション情報を削除
// if(isset($_SESSION['list'])){
  unset($_SESSION['list']);
// }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="TomokoEto.css">
<title>SweetsShopTomoko取り消し</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
  </header>
<div id="del_contents">
    <h2>カートは空になりました。</h2>
    <p><a href="item.php">商品一覧に戻る</a></p>
</div>
</div>
</body>
</html>
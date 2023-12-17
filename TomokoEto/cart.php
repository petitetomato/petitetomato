<?php
session_start();
//セッションから買い物カゴの中身(list)を取得
if(isset($_SESSION['list'])){
  $list = $_SESSION['list'];
}

var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="TomokoEto.css" rel="stylesheet">
<title>SweetsShopTomoko 店頭受け取り予約</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
  </header>
<div class="cart_contents_c">
  <h2>ショッピングカート(1/3)</h2>
  <p>▼買物カゴの中身は以下のとおりです。</p>
  <form action="customer.php" method="post" id="jump_to_check">
    <table class="cart" border="2">
      <tr>
        <th>No</th>
        <th>商品コード</th>
        <th>品名</th>
        <th>数量</th>
        <th>単価</th>
        <th>金額</th>
      </tr>
<?php
      $salesid = 1;
      $itemcount=0;
      $subtotal=0;
      foreach($list as [$icd,$iname,$suryo,$iprice,$subprice] ){
        $subprice = $suryo*$iprice;
        echo "<tr>";
        echo "<td>{$salesid}</td>";
        echo "<td>{$icd}</td>";
        echo "<td>{$iname}</td>";
        echo "<td>{$suryo}</td>";
        echo "<td>{$iprice}</td>";
        echo "<td>{$subprice}</td>";
        echo "</tr>";
        
        $salesid++;
        $itemcount += $suryo;
        $subtotal += $subprice;
      }
      echo "<td colspan='4' name='itemcount' class='ctd'>数量小計:{$itemcount}</td>";
      echo "<td colspan='2' name='subtotal' class='ctd'>購入金額小計:{$subtotal}</td>";
?>
    </table>
  <p><a href="item.php">買物を続ける</a></p>
  <p><a href="del.php">買物をやめる</a></p>
    <p>▼購入確認画面へ進む場合は以下のボタンを押してください。<br>
    <input type="submit" value="購入画面へ &gt;&gt;"></p>
  </form>
</div>
</div>
</body>
</html>
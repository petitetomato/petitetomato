<?php
session_start();
require_once('dbConfig.php');
$link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($link == null){
    die("接続に失敗しました：".mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
if(isset($_SESSION['list'])){
  $list = $_SESSION['list'];
}


$date = $_SESSION['customer']['date'];
$payment = $_SESSION['customer']['payment'];
$cname = $_SESSION['customer']['cname'];
$cemail = $_SESSION['customer']['cemail'];
$ctel = $_SESSION['customer']['ctel'];
$cmemo = $_SESSION['customer']['cmemo'];
$itemcount=$_SESSION['list']['itemcount'];
$subtotal=$_SESSION['list']['subtotal'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="TomokoEto.css">
 <title>SweetsShopTomoko　お客様情報確認ページ</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
</header>
  <div id="confirm_contents">
    <!-- メイン：開始 -->
          <form action="salesinsert.php" method="post">
            <h2>ご予約（最終確認）</h2>
            <p>予約内容をご確認後、<br>よろしければ予約確認ボタンを押してください。</p>
            <h3>お客様情報</h3>
            <table class="input" border="2">
          <tr><th>受取予定日</th><td><?php echo $date; ?></td></tr>
          <tr><th>お客様/お名前</th><td><?php echo $cname; ?></td></tr>
          <tr><th>お客様/電話番号</th><td><?php echo $ctel; ?></td></tr>
          <tr><th>お客様/メール</th><td><?php echo $cemail; ?></td></tr>
        </table>
        <br>
        <h3>予約情報</h3>
        <table class="input" border="2">
          <tr><th>数量合計</th><td><?php echo $subtotal; ?></td></tr>
          <tr><th>購入金額合計</th><td><?php echo $subtotal; ?></td></tr>
          <tr><th>お支払い方法</th><td><?php echo $payment; ?></td></tr>
          <tr><th>連絡事項</th><td><?php echo $cmemo; ?></td></tr>
        </table>
        <br>
          <p id="submit_a"><input type="submit" value="予約確定">
          <a href="customer.php"><input type="button" value="お客様情報入力画面に戻る"></a></p>
          </form>
  </div>
  <!-- コンテンツ：終了 -->
  <!-- フッター：開始 -->
  <!-- フッター：終了 -->
<?php
mysqli_close($link);
?>
</div>
</body>
</html>
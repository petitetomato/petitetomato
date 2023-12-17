<?php
session_start();


//エラーメッセージをセッションから取得
$dateErr = "";
if(isset($_SESSION['errMsg']['date']) == true){
  $dateErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['date']."</span>";
}

$cnameErr = "";
if(isset($_SESSION['errMsg']['cname']) == true){
  $cnameErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['cname']."</span>";
}
$cemailErr = "";
if(isset($_SESSION['errMsg']['cemail']) == true){
  $cemailErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['cemail']."</span>";
}
$ctelErr = "";
if(isset($_SESSION['errMsg']['ctel']) == true){
  $ctelErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['ctel']."</span>";
}
$czipErr = "";
if(isset($_SESSION['errMsg']['czip']) == true){
  $czipErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['czip']."</span>";
}
$caddrErr = "";
if(isset($_SESSION['errMsg']['caddr']) == true){
  $caddrErr = "<span style='color:red;'>"
  .$_SESSION['errMsg']['caddr']."</span>";
}
//セッションのエラーメッセージ削除
unset($_SESSION['errMsg']);

require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($link == null){
    die("接続に失敗しました：".mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$itemcount = htmlspecialchars($_POST['itemcount']);
$subtotal = htmlspecialchars($_POST['subtotal']);
$_SESSION['list']['itemcount']=$itemcount;
$_SESSION['list']['subtotal']=$subtotal;
//前回入力のデータをセッションから取得
$date = "";
if(isset($_SESSION['customer']['date'])==true){
  $date = $_SESSION['customer']['date'];
}
$payment = "店頭にてお支払い";
if(isset($_SESSION['customer']['payment'])==true){
  $payment = $_SESSION['customer']['payment'];
}
$cname = "";
if(isset($_SESSION['customer']['cname'])==true){
  $cname = $_SESSION['customer']['cname'];
}
$cemail = "";
if(isset($_SESSION['customer']['cemail'])==true){
  $cemail = $_SESSION['customer']['cemail'];
}
$ctel = "";
if(isset($_SESSION['customer']['ctel'])==true){
  $ctel = $_SESSION['customer']['ctel'];
}
$czip = "";
if(isset($_SESSION['customer']['czip'])==true){
  $czip = $_SESSION['customer']['czip'];
}
$caddr = "";
if(isset($_SESSION['customer']['caddr'])==true){
  $caddr = $_SESSION['customer']['caddr'];
}
$cmemo = "";
if(isset($_SESSION['customer']['cmemo'])==true){
  $cmemo = $_SESSION['customer']['cmemo'];
}
unset($_SESSION['customer']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="TomokoEto.css">
<title>SweetsShopTomoko　お客様情報入力ページ</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
</header>
<div class="cart_contents">
  <h2>ショッピングカート (2/3)</h2>
  <p>▼支払方法及び受取日時を入力してください。</p>
  <form  method="post" action="reservecheck.php">
  <table class="customer"  border="2">
    <th>店頭受取日<br>(3日後以降で選択できます)</th>
        <td><input type="date" name="date"
            value="<?php echo date('Y/m/d'); ?>"
            min="<?php echo date('Y/m/d', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));; 
             ?>" required></td>

    <tr>
      <th>支払方法</th>
      <td>
        <label><input type="radio" name="payment" value="店頭支払い" <?php if($payment=='店頭支払い'){echo 'checked';} ?>>店頭支払い</label>
        <label><input type="radio" name="payment" value="銀行振込" <?php if($payment=='銀行振込'){echo 'checked';} ?>>銀行振込</label>
      </td></tr>
    <tr>
      <th>お名前<span class="required">必須</span></th>
      <td>
        <input type="text" name="cname" size="35" value="<?php echo $cname; ?>"> <?php echo $cnameErr; ?>
      </td></tr>
    <tr>
      <th>E-Mail<span class="required">必須</span></th>
      <td>
        <input type="text" name="cemail" size="35" value="<?php echo $cemail; ?>"> <?php echo $cemailErr; ?> 
      </td></tr>
    <tr>
      <th>電話番号(ハイフンなし)<span class="required">必須</span></th>
      <td>
        <input type="text" name="ctel" size="35" value="<?php echo $ctel; ?>"> <?php echo $ctelErr; ?>

      </td></tr>
    <tr>
      <th>郵便番号<span class="required">必須</span></th>
      <td>
        <input type="text" name="czip" size="20" value="<?php echo $czip; ?>"> <?php echo $czipErr; ?>
      </td></tr>
    <tr>
      <th>住所<span class="required">必須</span></th>
      <td><input type="text" name="caddr" size="50" value="<?php echo $caddr; ?>"> <?php echo $caddrErr; ?> 
    </td></tr>
    <tr>
      <th>備考</th>
      <td>
        <input type="text" name="cmemo" size="50" value="<?php echo $cmemo; ?>">
      </td></tr>
  </table>
     <p><input type="submit" name="btn" value="確認画面へ"></p>
  </form>
</div>
</div>
</body>
</html>
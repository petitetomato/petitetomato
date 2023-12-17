<?php
session_start();
//入力チェックエラーの場合、商品コード、数量を受け取る
$icd = "";
$suryo = "";
if(isset($_GET['icd'])==true){
  $icd = $_GET['icd'];
}
if(isset($_GET['suryo'])==true){
  $suryo = $_GET['suryo'];
}

//セッションからエラーメッセージを受け取る
$errMsg = "";
if(isset($_SESSION['errMsg']) == true){
  $errMsg = "<span style='color:red;'>"
  .$_SESSION['errMsg']."</span>";
}
//セッションのerrMsgを削除
unset($_SESSION['errMsg']);
?>
  
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="TomokoEto.css" rel="stylesheet">
<link rel="stylesheet" href=".css" media="screen and (max-width:767px)">
<meta name="keywords" content="焼き菓子のお店/福岡市">
<meta name="description" content="お店のお菓子を紹介しています。お菓子の写真を載せています。">
<title>SweetsShopTomoko　商品一覧ページ</title>
</head>
<body>
<div id="wrap">
<header id="pagehead">
  <a href="index.php">
    <h1><img src="images/cupcake_icon.jpg" alt="お店のアイコン"></h1>
  </a>
</header>

<nav>
  <ul>
    <li><a href="index.php">トップ</a></li>
    <li><a href="item.php">商品一覧</a></li>
    <li><a href="drink.php">ドリンク</a></li>
    <li><img src="images/open_time.jpg" alt="営業時間の画像"></li>

  </ul>
</nav>
  <div id="breadcrumb">
  	<p><a href="index.php">トップページ</a>&nbsp;&gt;&nbsp;商品一覧ページ</p>
  </div>
  <div id="contents">
    <div id="item_contents">
  <h3>SweetsShopTomoko店頭受取予約</h3>
  <p><form action="salescheck.php" method="post" name="Sshop">
    購入商品
      <select name="icd">
        <option value="1"
          <?php if($icd=="1"){echo "selected";} ?>>Chocolateカップケーキ/1個</option>
        <option value="2"
          <?php if($icd=="2"){echo "selected";} ?>>Caramelカップケーキ/1個</option>
        <option value="3"
          <?php if($icd=="3"){echo "selected";} ?>>Espressoカップケーキ/1個</option>
        <option value="4"
          <?php if($icd=="4"){echo "selected";} ?>>Lemonカップケーキ/1個</option>
        <option value="5"
          <?php if($icd=="5"){echo "selected";} ?>>BlueberryChocolateカップケーキ/1個</option>
        <option value="6"
          <?php if($icd=="6"){echo "selected";} ?>>Rasberryカップケーキ/1個</option>
        <option value="7"
          <?php if($icd=="7"){echo "selected";} ?>>Vanillaロッシェ/3個入</option>
        <option value="8"
          <?php if($icd=="8"){echo "selected";} ?>>HazelnutsChocolateロッシェ/3個入</option>
        <option value="9"
          <?php if($icd=="9"){echo "selected";} ?>>GingerbreadManクッキー/2枚入</option>
      </select>
      数量
      <input type="text" name="suryo" 
        value="<?php echo $suryo; ?>">
      <input type="submit" value="カートに入れる">
      <?php echo $errMsg; ?>
  </p>
  </form>
    </div>

  <article>
    <h2 id="item_h2">SweetsShopTomoko商品一覧</h2>
    <figure>
    	<img src="images/thick_chocolate.jpg">
      <figcaption>Chocolateカップケーキ/1個</figcaption>
    </figure>
    <figure>
    	<img src="images/caramel_muffin.jpg">
      <figcaption>Caramelカップケーキ/1個</figcaption>
    </figure>
    <figure>
    	<img src="images/Espresso.jpg">
      <figcaption>Espressoカップケーキ/1個</figcaption>
    </figure>
    <figure>
    	<img src="images/lemon-cupcake.jpg">
      <figcaption>Lemonカップケーキ/1個</figcaption>
    </figure>
    <figure>
    	<img src="images/blueberry_chocolate.jpg">
      <figcaption>BlueberryChocolateカップケーキ/1個</figcaption>
    </figure>
    <figure>
    	<img src="images/rasberry.jpg">
      <figcaption>Rasberryカップケーキ/1個<br>【2月まで限定】</figcaption>
    </figure>
    <figure>
    	<img src="images/vanilla_roche.jpg">
      <figcaption>Vanillaロッシェ/3個入</figcaption>
    </figure>
    <figure>
    	<img src="images/Hazelnut-Chocolate.jpg">
      <figcaption>HazelnutsChocolateロッシェ/3個入</figcaption>
    </figure>
    <figure>
    	<img src="images/gingerbread_man.jpg">
      <figcaption>GingerbreadManクッキー/2枚入<br>【2月まで限定】</figcaption>
    </figure>

  </article>
  </div>
  <footer>
    <div id="back">
      <p>
        <a href="javascript:history.back()">
        <input type="button" width="100" height="20" class="back" value="前のページに戻る">
        </a>
      <a href="#pagehead"><input type="button" value="ページの先頭へ" width="100" height="20" ></a></p>
    </div>
      <hr>
      <div id="bottom">
      <address>
        メールでのお問い合わせは
        <a href="mailto:sweetsshoptomoko@web.ne.jp">sweetsshoptomoko@web.ne.jp</a>へお願いします。
      </address>
      <p>
        <small>Copyright &copy; 2023 Sweets Shop Project.</small>
      </p>
    </div>
  </footer>
</div>
</body>
</html>

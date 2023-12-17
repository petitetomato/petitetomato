<?php
session_start();

//前画面から値を受けとり、変数に格納
$icd = htmlspecialchars($_POST['icd']);   //商品コード
$suryo = htmlspecialchars($_POST['suryo']);   //数量

//数量の数値チェック（未入力でなく、数値で、１以上か？）
$errMsg="";
if(empty($suryo) == true && $suryo != 0){
  $errMsg = "数量が未入力です";
}else{
  if(is_numeric($suryo) != true){
    $errMsg = "数量は数値で入力してください";
  }else{
    if($suryo <= 0){
      $errMsg = "数量は1以上を指定してください";
    }
  }
}

//エラーがなかった場合、データベースから、商品情報を取得
if($errMsg == ""){
  //データベース接続
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
  if ($link == null){
      die("接続に失敗しました：".mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");

  //商品テーブル(item)から、品名、単価を取得
  //SQL文作成
  $sql = "SELECT iname, iprice FROM item
   WHERE icd={$icd}";

  //SQL実行
  $result = mysqli_query($link, $sql );
  //フェッチ（1行読み込む）
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $iname = $row['iname'];
  $iprice = $row['iprice'];
  //購入情報を配列に格納
  $list = [$icd,$iname,$suryo,$iprice,$suryo*$iprice,$itemcount,$subtotal];
  // var_dump($list);
  //配列をセッションに格納
  $_SESSION['list'][]=$list;
  // var_dump($_SESSION);
  //メモリー開放
  mysqli_free_result($result);
  //データベース切断
  mysqli_close($link);

}

//画面遷移
if($errMsg == ""){
  // echo "エラーなし";
  header("location: cart.php");
}else{
  // echo "エラーあり".$errMsg;
  $_SESSION['errMsg']=$errMsg;    //エラー内容をセッションに格納する
  // var_dump($_SESSION);
  header("location: item.php?icd={$icd}&suryo={$suryo}");
}


?>
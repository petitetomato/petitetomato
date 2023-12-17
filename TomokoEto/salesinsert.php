<?php
session_start();
//$list=array();
if(isset($_SESSION['list'])){
  $list = $_SESSION['list'];
}

//前画面から値を受けとり、変数に格納
$date = htmlspecialchars($_POST["date"]);
$payment = htmlspecialchars($_POST["payment"]);
$cname = htmlspecialchars($_POST["cname"]);
$cemail = htmlspecialchars($_POST["cemail"]);
$ctel = htmlspecialchars($_POST["ctel"]);
$czip = htmlspecialchars($_POST["czip"]);
$caddr = htmlspecialchars($_POST["caddr"]);
$cmemo = htmlspecialchars($_POST["cmemo"]);

//入力値をセッションに格納する
/*$_SESSION['customer']['date'] = $date;
$_SESSION['customer']['payment'] = $payment;
$_SESSION['customer']['cname'] = $cname;
$_SESSION['customer']['cemail'] = $cemail;
$_SESSION['customer']['ctel'] = $ctel;
$_SESSION['customer']['czip'] = $czip;
$_SESSION['customer']['caddr'] = $caddr;
$_SESSION['customer']['cmemo'] = $cmemo;*/

$date = $_SESSION['customer']['date'];
$payment = $_SESSION['customer']['payment'];
$cname = $_SESSION['customer']['cname'];
$cemail = $_SESSION['customer']['cemail'];
$ctel = $_SESSION['customer']['ctel'];
$czip = $_SESSION['customer']['czip'];
$caddr = $_SESSION['customer']['caddr'];
$cmemo = $_SESSION['customer']['cmemo'];

  //セッションから買い物カゴの中身(list)を取得
  $list = $_SESSION['list'];  

  //データベース接続
  require_once('dbConfig.php');
  $link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
  if ($link == null){
      die("接続に失敗しました：".mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  //買い物カゴの行数分繰返し
  foreach($list as [$icd,$iname,$suryo,$iprice,$subprice] ){
    $sql = "INSERT INTO sales(date,icd,iname,scount,sprice,
    subtotal,payment,cname,cemail,ctel,czip,caddr,cmemo)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";  
    if ($stmt = mysqli_prepare($link,$sql)){
      mysqli_stmt_bind_param($stmt,"sisiiisssssss",
      $date,$icd,$iname,$suryo,$iprice,$subprice,
      $payment,$cname,$cemail,$ctel,$czip,$caddr,$cmemo);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
  }

  //データベース切断
  mysqli_close($link);

//画面遷移
  header("location: finish.php");

?>
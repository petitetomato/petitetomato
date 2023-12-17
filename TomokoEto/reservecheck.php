<?php
session_start();

$itemcount = htmlspecialchars($_POST['itemcount']);
$subtotal = htmlspecialchars($_POST['subtotal']);
$date = htmlspecialchars($_POST['date']);   
$payment = htmlspecialchars($_POST['payment']);   
$cname = htmlspecialchars($_POST['cname']);   
$cemail = htmlspecialchars($_POST['cemail']);   
$ctel = htmlspecialchars($_POST['ctel']);   
$czip = htmlspecialchars($_POST['czip']);   
$caddr = htmlspecialchars($_POST['caddr']);   
$cmemo = htmlspecialchars($_POST['cmemo']); 
$itemcount = $_POST['itemcount'];
$subtotal = $_POST['subtotal'];

//入力値をセッションに格納する
$_SESSION['list']['itemcount'] = $itemcount;
$_SESSION['list']['subtotal'] = $subtotal;
$_SESSION['list']['iname'] = $iname;
$_SESSION['list']['suryo'] = $suryo;
$_SESSION['list']['icd'] = $icd;
$_SESSION['customer']['ctel'] = $ctel;
$_SESSION['customer']['czip'] = $czip;
$_SESSION['customer']['caddr'] = $caddr;
$_SESSION['customer']['cmemo'] = $cmemo;
$_SESSION['customer']['date'] = $date;
$_SESSION['customer']['payment'] = $payment;
$_SESSION['customer']['cname'] = $cname;
$_SESSION['customer']['cemail'] = $cemail;

//未入力チェック
$errMsg = array();

if (empty($payment)==true){
    $errMsg['payment']="支払方法が未入力です";
}
if (empty($cname)==true){
    $errMsg['cname']="名前が未入力です";
}
if (empty($cemail)==true){
    $errMsg['cemail']="eメールアドレスが未入力です";
}
if (empty($ctel)==true){
    $errMsg['ctel']="電話番号が未入力です";
}elseif( preg_match('/^0[0-9]{9,10}\z/', $ctel ) ) {
	// 文字列が電話番号（ハイフンなし）である場合

}else{
	// 文字列が電話番号（ハイフンなし）でない場合
    $errMsg['ctel']="電話番号はハイフンなしで入力してください。";
}
if (empty($czip)==true){
    $errMsg['czip']="郵便番号が未入力です";
} 
if (empty($caddr)==true){
    $errMsg['caddr']="住所が未入力です";
}

if (count($errMsg)==0){
    // echo "エラーなし<br>";
    header("location: salesconfirm.php");
} else {
    // echo "エラーあり<br>";
    $_SESSION['errMsg']=$errMsg;    //エラー内容をセッションに格納する
    header("location: ./customer.php?Error=".$_SESSION['errMsg']['']);
}
// var_dump($_SESSION);
exit();


?>
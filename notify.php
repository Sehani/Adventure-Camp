<?php
header("Access-Control-Allow-Origin: *");

include 'inc/connection.php';

$merchant_id      = $_POST['merchant_id'];
$booking_id       = $_POST['order_id'];
$payhere_amount   = $_POST['payhere_amount'];
$payhere_currency = $_POST['payhere_currency'];
$status_code      = $_POST['status_code'];
$md5sig           = $_POST['md5sig'];

  $day = date("Y-m-d");
  $time = date("H:i:s");

$merchant_secret = '4E0xNK044V58WzyN7NpP4b4Dw2i5T6g7A4TwSOpuEbjB'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success
  $sql = "UPDATE payments SET  pay              = '$payhere_amount',
                                    payhere_response = '$local_md5sig',
                                    currency_type    = '$payhere_currency',
                                    paymentMethod    = 'online',
                                    date             = '$day',
                                    time             = '$time'
                                    WHERE booking_id =$booking_id";
  
  $update = mysqli_query($con, $sql);
}


$to = "unzoysa.un@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>".$merchant_id."</th>
<th>".$order_id."</th>
<th>".$payhere_amount."</th>
<th>".$payhere_currency."</th>
<th>".$status_code."</th>
<th>Lastname</th>
</tr>
<tr>
<td>merchant_id </td>
<td>order_id </td>
<td>payhere_amount </td>
<td>payhere_currency </td>
<td>status_code </td>
</tr>
</table>
</body>
</html>
";
$msg = "error";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

if($update) {
mail($to,$subject,$message,$headers);
  }
else {
 mail($to,$subject,$msg,$headers);
}


?>
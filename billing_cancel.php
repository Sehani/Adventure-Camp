<?php
session_start();

if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
} else {
    header("Location: login-user.php");
}
include 'inc/connection.php';

$bookID = $_POST['bookID'];

$sql_select = "SELECT * FROM payments WHERE booking_id= '$bookID'";
$result_select = mysqli_query($conn, $sql_select);
$row_select = mysqli_fetch_assoc($result_select);

$total = $row_select["total"];
$extra_charge = $total * 10 / 100;
$status = $row_select["status"];
$customer_ID = $row_select["customer_id"];


$sql_customer = "SELECT * FROM usertable WHERE id='$customer_ID'";
$result_customer = mysqli_query($conn, $sql_customer);
$row_customer = mysqli_fetch_assoc($result_customer);

$email = $row_customer["email"];


$to_email = $email;
$subject = 'Payment Cancelation Details';

$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<!--[if gte mso 9]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
  <title></title>
  
    <style type="text/css">
      table, td { color: #000000; } @media only screen and (min-width: 620px) {
  .u-row {
    width: 600px !important;
  }
  .u-row .u-col {
    vertical-align: top;
  }

  .u-row .u-col-100 {
    width: 600px !important;
  }

}

@media (max-width: 620px) {
  .u-row-container {
    max-width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
  }
  .u-row .u-col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important;
  }
  .u-row {
    width: calc(100% - 40px) !important;
  }
  .u-col {
    width: 100% !important;
  }
  .u-col > div {
    margin: 0 auto;
  }
}
body {
  margin: 0;
  padding: 0;
}

table,
tr,
td {
  vertical-align: top;
  border-collapse: collapse;
}

p {
  margin: 0;
}

.ie-container table,
.mso-container table {
  table-layout: fixed;
}

* {
  line-height: inherit;
}

a[x-apple-data-detectors="true"] {
  color: inherit !important;
  text-decoration: none !important;
}

</style>
  
  

<!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->

</head>

<body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
  <!--[if IE]><div class="ie-container"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
  <tbody>
  <tr style="vertical-align: top">
    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->
    

<div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #fcf9f8;">
    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #fcf9f8;"><![endif]-->
      
<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
  
<table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:44px 10px 14px;font-family:"Cabin",sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;"><span style="font-family: Cabin, sans-serif; font-size: 14px; line-height: 19.6px;"><span style="font-size: 26px; line-height: 36.4px;"><strong><span style="line-height: 36.4px; font-size: 26px;">Your Payment Details</span></strong></span></span></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:4px 55px 10px;font-family:"Cabin",sans-serif;" align="left">
        
  <div style="color: #000000; line-height: 170%; text-align: center; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 170%;">Payment ID: ' . $bookID. '</p>
    <p style="font-size: 14px; line-height: 170%;">Payment Amount: ' . $total . '</p>
<p style="font-size: 14px; line-height: 170%;">Due Payment After Canceltion: ' . $extra_charge . '</p>
<p style="font-size: 14px; line-height: 170%;">Status: ' . $status . '</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Cabin",sans-serif;" align="left">
        
  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
      <tr style="vertical-align: top">
        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
          <span>&#160;</span>
        </td>
      </tr>
    </tbody>
  </table>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:4px 55px 10px;font-family:"Cabin",sans-serif;" align="left">
        
  <div style="line-height: 170%; text-align: center; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 170%;">10% charge when you cancel ongoing payment.thanks for being with us</p>
    <p style="font-size: 14px; line-height: 170%;">2021 Olympia Adventure Camp - All right reserved</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>


    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </td>
  </tr>
  </tbody>
  </table>
  <!--[if mso]></div><![endif]-->
  <!--[if IE]></div><![endif]-->
</body>

</html>
';
$from = 'thisariDilashani@email.com';
$fromName = 'Thisari_Dilshani';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers .= 'From: '.$from.'' . "\r\n" .
     'Reply-To: '.$to_email.'' . "\r\n" . 
     'X-Mailer: PHP/' . phpversion();
     
$sendMail = mail($to_email, $subject, $message, $headers);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($status == 'paid') {
        $sql = "UPDATE booking SET 
        paid_status= 'unpaid', due_amount='$extra_charge' WHERE booking_id ='$bookID'";

        if (mysqli_query($conn, $sql)) {
            echo "paid";
        }
    } else {
        $sql = "UPDATE booking SET 
        status ='cancel' WHERE booking_id ='$bookID'";

        if (mysqli_query($conn, $sql)) {
            echo "cancel";
        }
    }

    if (mysqli_query($conn, $sql)) {

        $sql_extra = "UPDATE payments SET 
        total ='$extra_charge' WHERE booking_id ='$bookID'";

        if (mysqli_query($conn, $sql_extra)) {
        }
    } else {
        echo "error" . mysqli_error($conn);
    }
}

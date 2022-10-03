<?php
session_start();

$status = '';
// checking if the form is submit
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email    = $_POST['email'];
  $Day_visited  = $_POST['mydate'];
  $Feedback  = $_POST['Feedback'];

  $to       = 'olympiaadventurecamp@gmail.com';
  $mail_subject = 'Message from Website';
  $email_body   = "Feedback from Olympia Adventures of the Website: <br>";
  $email_body   .= "<b>From:</b> {$name} <br>";
  $email_body   .= "<b>Day_visited:</b> {$Day_visited} <br>";
  $email_body   .= "<b>Feedback:</b><br>" . nl2br(strip_tags($Feedback));

  $header       = "From: {$email}\r\nContent-Type: text/html;";

  $send_mail_result = mail($to, $mail_subject, $email_body, $header);

  if ($send_mail_result) {
    $status = '<p class="success">Feedback sent succusfully.</p>';
  } else {
    $status = '<p class="error">Error: Feedback Was Not Sent.</p>';
  }
}
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <title>Home</title>
  <link rel="stylesheet" href="css/main.css">
  <?php include "inc/head.php" ?>
</head>

<body>



  <!-- Header-->

  <header>

    <div class="header-area">
    <?php include "inc/navbar.php" ?>
    </div>

  </header>

  <center>
    <h1>FEEDBACK FORM</h1>
    <?php echo $status; ?>
    <form action="Feedback.php" method="post" class="form" onsubmit="return validateForm();">
      <div class="ftype">
        <label for="">Feedback type:</label>
        <input type="radio" name="Feedback type" id="Suggestions" value="Suggestions" checked>
        <label for="Suggestions">Suggestions</label>
        <input type="radio" name="Feedback type" id="Complaints" value="Complaints">
        <label for="Complaints">Complaints</label>

      </div>
      <div class="name">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Type your full name" required>
      </div>
      <div class="email">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" placeholder="Type your Email Address" required>
      </div>
      <div class="mydate">
        <label for="mydate">Day visited:</label>
        <input type="date" name="mydate" id="mydate">
      </div>
      <div>
        <label for="">Feedback:</label>
        <textarea name="Feedback" id="feedback" cols="30" rows="10" placeholder="Describe your Feedback..." required></textarea>
      </div>
      <div>
        <button type="submit" name="submit">Submit</button>

      </div>
    </form>
  </center>

  <script src="js/script.js"></script>
</body>

</html>
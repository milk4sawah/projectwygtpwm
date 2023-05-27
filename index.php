<?php

session_start();

if (empty($_SESSION["mail_success"])) $_SESSION["mail_success"] = false;
if (empty($_SESSION["mail_error"])) $_SESSION["mail_error"] = false;

$success = $_SESSION["mail_success"];
$error = $_SESSION["mail_error"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Send Mail</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

  <link rel="stylesheet" href="css/dist/contact.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  
  
</head>

<body>

<section class="section-contact">
  <div class="container">
    <div class="contact-form">
      <h2>Will you go to prom with me?</h2>
      <form class="form-box" method="POST" action="email.php">
        <div class="input-box w100">
          <input type="hidden" name="name" value="Not informed">
        </div>
        <div class="input-box w100">
          <input class="button" type="submit" name="answer" value="Yes">
          <input class="button" type="submit" name="answer" value="No">
        </div>
        <div class="input-box w100 message">
          <?php include 'contact-message.php'; ?>
        </div>
      </form>
    </div>
  </div>
</section>


</body>

</html>

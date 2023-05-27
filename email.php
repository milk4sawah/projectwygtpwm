<?php

session_start();
error_reporting(E_ALL);
date_default_timezone_set("America/Sao_Paulo");

require_once("php-mailer/PHPMailer.php");
require_once("php-mailer/SMTP.php");
require_once("php-mailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

function redirectToIndex()
{
  header("Location: ./index.php");
  exit;
}

function sendMail($name, $subject, $date)
{
  include './config.php';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = $myemail;
  $mail->Password = $mypassword;
  $mail->Port = 587;

  $mail->setFrom($myemail, $name);
  $mail->addReplyTo($myemail, $name);
  $mail->addAddress('itscjoseph@gmail.com');

  $mail->isHTML(true);
  $mail->Subject = $subject;

  if ($subject === "She said yes") {
    $mail->Body = "<b>Name:</b> {$name}<br><b>Email:</b> {$myemail}<br><br><b>Date:</b> {$date}<br><br><b>Response:</b> She said yes";
  } else if ($subject === "She said no") {
    $mail->Body = "<b>Name:</b> {$name}<br><b>Email:</b> {$myemail}<br><br><b>Date:</b> {$date}<br><br><b>Response:</b> She said no";
  }

  if ($mail->send()) {
    $_SESSION["mail_success"] = true;
  } else {
    $_SESSION["mail_error"] = true;
  }

  redirectToIndex();
}

function start()
{
  if (
    isset($_POST["answer"]) && ($_POST["answer"] === "Yes" || $_POST["answer"] === "No")
  ) {

    $name = !empty($_POST["name"]) ? $_POST["name"] : "Not informed";
    $answer = $_POST["answer"];
    $subject = $answer === "Yes" ? "She said yes" : "She said no";
    $date = date("d/m/Y H:i");

    sendMail($name, $subject, $date);
  } else {
    $_SESSION["mail_error"] = true;
    redirectToIndex();
  }
}

start();

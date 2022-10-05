<?php header('Access-Control-Allow-Origin: *'); ?>
<?php $name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['msg_subject'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$formcontent="From: $name \n Subject : $subject \n Message: $message \n Phone: $phone";
//$recipient = "amoljadhav85@gmail.com";
$recipient = "deepalisangale3@gmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
require_once "thanku.php";
?>
<?php
session_start();
require_once('connection.php');
require_once('PHPMailer/PHPMailerAutoload.php');


$sql = "SELECT * FROM member WHERE Email = '" . trim($_POST['Email']) . "' ";

$sql = "UPDATE member SET Password=? WHERE UserID=?";

$objQuery = mysqli_query($con, $sql);
$objResult = mysqli_fetch_array($objQuery);

?>
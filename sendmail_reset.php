<?php
session_start();

require_once('connection.php');
require_once('PHPMailer/PHPMailerAutoload.php');


$sql = "SELECT * FROM member WHERE Email = '" . trim($_POST['Email']) . "' ";
$objQuery = mysqli_query($con, $sql);
$objResult = mysqli_fetch_array($objQuery);
if (mysqli_num_rows($objResult) == 1) {
    $row = mysqli_fetch_array($objResult);

    $name = $row["Name"];
    $lname = $row["Surname"];

    $Uid = mysqli_insert_id($con);


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->isHTML();
    $mail->CharSet = "utf-8";
    $mail->Username = "test.wilddog@gmail.com";
    $mail->Password = "wilddog12";
    $mail->SetFrom = ('no-reply@domaintest.com');
    $mail->FromName = "Wilddog";
    $mail->Subject = "การตั้งค่ารหัสผ่านใหม่ : Wilddog";
    $mail->Body = "สวัสดีคุณ " . $name . " " . $lname . "<br>\n====================================<br>\n\nระบบได้รับคำร้องเพื่อขอเปลี่ยนแปลงรหัสผ่านของคุณแล้ว\nกรุณาคลิกลิงก์ด้านล่าง เพื่อตั้งค่ารหัสผ่านใหม่<br>\n====================================<br>\n\n http://www.localhost/wilddog/reset.php?uid=" . $Uid . "<br>";
    $mail->AddAddress($_POST["Email"],  $name );


    //ตรวจสอบว่าส่งผ่านหรือไม่
    if ($mail->Send()) {
        echo "<script language=\"JavaScript\">";
        echo "alert('ส่งอีเมลยืนยันเรียบร้อยแล้ว');window.location='index.php';";
        echo "</script>";
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ส่งอีเมลยืนยันไม่สำเร็จ');  window.history.back();";
        echo "</script>";
    }
} else {
    header("location: ../error.php");
    exit();
}


mysqli_close($con);
?>
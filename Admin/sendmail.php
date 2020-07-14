<?php
session_start();

require_once('../connection.php');
require_once('../PHPMailer\PHPMailerAutoload.php');

//check email
$sql = "SELECT * FROM member WHERE Email = '" . trim($_POST['Email']) . "' ";
$objQuery = mysqli_query($con, $sql);
$objResult = mysqli_fetch_array($objQuery);
if ($objResult) {
    echo "<script language=\"JavaScript\">";
    echo "alert('อีเมลถูกใช้ไปแล้ว กรุณากรอกอีเมลอื่น'); window.history.back();";
    echo "</script>";
} else {

    $sql = "INSERT INTO member (Name,Surname,Email,Password,Phone,Address,Status,Active) VALUES ('" . $_POST["Name"] . "', '" . $_POST["Surname"] . "',
		'" . $_POST["Email"] . "','" . $_POST["Password"] . "' ,'" . $_POST["Phone"] . "','" . $_POST["Address"] . "','USER','No')";
    $objQuery = mysqli_query($con, $sql);

    $Uid = mysqli_insert_id($con);
    //echo "Register Completed!<br>Please check your email to activate account";


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
    $mail->Subject = "ยืนยันการสมัครสมาชิก Wilddog";
    $mail->Body = "สวัสดีคุณ " . $_POST["Name"] . " " . $_POST["Surname"] . "<br>\n====================================<br>\n\nกรุณาคลิกลิงก์ด้านล่าง เพื่อยืนยันการสมัครสมาชิก<br>\n====================================<br>\n\n http://www.localhost/wilddog/activate.php?uid=" . $Uid . "<br>";
    $mail->AddAddress($_POST["Email"], $_POST["Name"]);


    //ตรวจสอบว่าส่งผ่านหรือไม่
    if ($mail->Send()) {
        echo "<script language=\"JavaScript\">";
        echo "alert('ส่งอีเมลยืนยันเรียบร้อยแล้ว');window.location='../Admin/manage_user.php';";
        echo "</script>";
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ส่งอีเมลยืนยันไม่สำเร็จ');  window.history.back();";
        echo "</script>";
    }


}

mysqli_close($con);
?>
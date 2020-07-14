<?php
session_start();

if (isset($_POST['Email'])) {
    require_once("connection.php");
    require_once('PHPMailer/PHPMailerAutoload.php');

    $Email = $_POST['Email'];

    $sql = "SELECT * FROM member 
                  WHERE  Email='" . $Email . "'  ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION["UserID"] = $row["UserID"];
        $_SESSION["Name"] = $row["Name"];
        $_SESSION["Surname"] = $row["Surname"];
        $_SESSION["Phone"] = $row["Phone"];
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["Address"] = $row["Address"];
        $_SESSION["Status"] = $row["Status"];



if ($result) {

    $Uid = $_SESSION["UserID"];


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
    $mail->Body = "สวัสดีคุณ " . $_SESSION["Name"] . " " . $_SESSION["Surname"] . "<br>\n====================================<br>\n\nระบบได้รับคำร้องเพื่อขอเปลี่ยนแปลงรหัสผ่านของคุณแล้ว\nกรุณาคลิกลิงก์ด้านล่าง เพื่อตั้งค่ารหัสผ่านใหม่<br>\n====================================<br>\n\n http://www.localhost/wilddog/resetpass.php?uid=" . $Uid . "<br>";
    $mail->AddAddress($_SESSION["Email"] ,  $_SESSION["Name"] );


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
}
} else {
    echo "<script language=\"JavaScript\">";
    echo "alert('ส่งอีเมลยืนยันไม่สำเร็จ');  window.history.back();";
    echo "</script>";
    }
}
mysqli_close($con);
?>
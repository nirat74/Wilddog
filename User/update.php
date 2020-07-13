<?php

session_start();
    
	require_once('../connection.php');
	require_once('../PHPMailer\PHPMailerAutoload.php');

	
	$id = trim($_POST['UserID']);
	$Name = trim($_POST['Name']);
	$Surname = trim($_POST['Surname']);
	$Email = trim($_POST['Email']);
	$Phone = trim($_POST['Phone']);
	$Address = trim($_POST['Address']);
	$Password = trim($_POST['Password']);
    $sql = "SELECT * FROM member WHERE UserID = '".$id."' ";
    $objQuery = mysqli_query($con, $sql);
    $objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		$sql2 = "UPDATE member SET Name = $Name, Surname = $Surname, Email = $Email, Phone = $Phone, Address = $Address, Password = $Password WHERE UserID = '".$id."' ";
        $query = mysqli_query($con, $sql2);

        if (mysqli_affected_rows($con)) {

            echo "<script language=\"JavaScript\">";
            echo "alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); location='../User/profile.php';";
            echo "</script>";

            mysqli_close($con);


        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่มีสามารถแก้ไขข้อมูลผู้ใช้งานได้'); location='../User/profile.php';";
            echo "</script>";
        }
    }
    else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ไม่มีผู้ใช้งาน'); location='../User/profile.php';";
        echo "</script>";
    }

	

?>
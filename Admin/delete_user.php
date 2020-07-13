<?php


    require_once('../connection.php');

    $id = trim($_POST['UserID']);
    $sql = "SELECT * FROM member WHERE UserID = '".$id."' ";
    $objQuery = mysqli_query($con, $sql);
    $objResult = mysqli_fetch_array($objQuery);
    if ($objResult) {
        $sql2 = "DELETE FROM member WHERE UserID = '".$id."' ";
        $query = mysqli_query($con, $sql2);

        if (mysqli_affected_rows($con)) {

            echo "<script language=\"JavaScript\">";
            echo "alert('ลบข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); location='../Admin/manage_user.php';";
            echo "</script>";

            mysqli_close($con);


        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่มีสามารถลบข้อมูลผู้ใช้งานนี้ได้'); window.history.back();";
            echo "</script>";
        }
    }
    else {
        echo "<script language=\"JavaScript\">";
        echo "alert('ไม่มีผู้ใช้งานนี้'); window.history.back();";
        echo "</script>";
    }

?>
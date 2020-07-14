<?php
session_start();
if (isset($_POST['UserID'])) {
    require_once("connection.php");

   
    $id = $_POST['UserID'];
    $pass = $_POST['Password'];
    echo $pass;
    echo $id;
    $sql = "SELECT * FROM member 
    WHERE  UserID='" . $id . "'  ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 1) {
$row = mysqli_fetch_array($result);

$_SESSION["UserID"] = $row["UserID"];


        if ($result) {

            $sql2 = "UPDATE member SET Password = '" . $pass . "' WHERE UserID = '" . $_SESSION["UserID"] . "' ";

            $result2 = mysqli_query($con, $sql2);
            if (mysqli_affected_rows($con)) {

                echo "<script language=\"JavaScript\">";
                echo "alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); location : index.php;";
                echo "</script>";

                mysqli_close($con);
            } else {
                echo "<script language=\"JavaScript\">";
                echo "alert('ไม่มีสามารถแก้ไขข้อมูลผู้ใช้งานได้'); window.history.go (-2);";
                echo "</script>";
            }
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่มีผู้ใช้งาน'); window.history.go (-2);";
            echo "</script>";
        }
    }
    mysqli_close($con);
}


?>



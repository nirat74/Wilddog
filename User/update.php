<?php

session_start();

require_once('../connection.php');


$id = trim($_POST['UserID']);

$sql = "SELECT Name FROM member WHERE UserID = '" . $id . "'";

$result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $sql2 = "UPDATE member SET Name = '" . $_POST['Name'] . "', Surname = '" . $_POST['Surname'] . "', Email = '" . $_POST['Email'] . "', Phone = '" . $_POST['Phone'] . "', Address = '" . $_POST['Address'] . "' WHERE UserID = '" . $id . "' ";

            $result2 = mysqli_query($con, $sql2);
            if (mysqli_affected_rows($con)) {

                echo "<script language=\"JavaScript\">";
                echo "alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); window.history.go (-2);";
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

        mysqli_close($con);



?>
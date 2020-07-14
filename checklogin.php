<?php
session_start();
if (isset($_POST['Email'])) {
    require_once("connection.php");
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM member 
                  WHERE  Email='" . $Email . "' 
                  AND  Password='" . $Password . "' ";
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

        if ($_SESSION["Status"] == "ADMIN") {

            Header("Location: Admin/manage_user.php");
        }
        if ($_SESSION["Status"] == "USER") {

            Header("Location: User/profile.php");
        }
    } else {
        echo "<script>";
        echo "alert(\" Email หรือ  Password ไม่ถูกต้อง \n กรุณากรอกใหม่\");";
        echo "window.history.back()";
        echo "</script>";

    }
} else {

    echo "<script>";
    echo "alert(\" Email หรือ  Password ไม่ถูกต้อง \n กรุณากรอกใหม่\");";
    echo "window.history.back()";
    echo "</script>"; //user & password incorrect back to login again

}
?>
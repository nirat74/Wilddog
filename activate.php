<?php
require_once('connection.php');

$sql = "SELECT * FROM member WHERE UserID = '" . trim($_GET['uid']) . "' ";
$objQuery = mysqli_query($con, $sql);
$objResult = mysqli_fetch_array($objQuery);
if (!$objResult) {
    echo "<script language=\"JavaScript\">";
    echo "alert('Activate Invalid !');window.location='index.php';";
    echo "</script>";
} else {
    $sql = "UPDATE member SET Active = 'Yes'  WHERE UserID = '" . trim($_GET['uid']) . "' ";
    $objQuery = mysqli_query($con, $sql);

    echo "<script language=\"JavaScript\">";
    echo "alert('Activate Successfully !');window.location='index.php';";
    echo "</script>";
}

mysqli_close($con);
?>
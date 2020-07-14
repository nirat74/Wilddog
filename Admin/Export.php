<?php

set_time_limit(300);
require_once('../connection.php');


$folder = '../file';
$objScan = scandir($folder);

$query = "SELECT Name, Surname, Phone, Email, Address, Status FROM member";


if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}


$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

$output = fopen($folder . "/" . "User.csv", 'w');
fputcsv($output, array('Name', 'Surname', 'Phone', 'Email', 'Address', 'Status'));


if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}

fclose($output);

echo "<script language=\"JavaScript\">";
echo "alert('Export ข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); window.history.back();";
echo "</script>";
?>
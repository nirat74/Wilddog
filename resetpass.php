<?php

session_start();
if (isset($_POST['UserID'])) {
    require_once("connection.php");

   
    $id = $_POST['UserID'];
$sql = "SELECT * FROM member WHERE UserID = '" . $id . "'";


$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $UserID = $row["UserID"];
    $Name = $row["Name"];
    $Surname = $row["Surname"];
    $Phone = $row["Phone"];
    $Email = $row["Email"];
    $Address = $row["Address"];
    $Status = $row["Status"];
}

mysqli_close($con);
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/21d9f8417f.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="wrapper" style="background-color: rgb(103, 151, 160);">
    <div class="inner">
        <div class="image-holder">
            <img src="images/8.jpg" alt="">
        </div>
        <form name="form-reset" method="post" action="update_password.php" id="reset" novalidate>
            <h3>Reset Password Form</h3>
            <div class="form-wrapper">
                        <input class="form-control" type="password" name="Password" id="password1" autocomplete="off" placeholder="Password"
                               value=""   required><i class="zmdi zmdi-lock"></i>
                    
                </div>
<?php echo $_get["UserID"]; ?>
                <div class="form-wrapper">
                        <input class="form-control" type="password" name="Confirm" id="password2" autocomplete="off" placeholder="Confirm Password"
                               value=""   required><i class="zmdi zmdi-lock"></i>
                    
                </div>

                <input type="hidden" name="UserID" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-success" value="Submit">
                <a href="index.php" class="btn btn-default">Login</a>
        </form>
    </div>
</div>

<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#reset").on("submit", function () {
                var form = $(this)[0];
                if (document.getElementById("password1").value != document.getElementById("password2").value) {
                    alert("รหัสผ่านไม่ตรงกัน กรุณากรอกอีกครั้ง!");
                    event.preventDefault();
                    event.stopPropagation();
                }
                else if (form.checkValidity() == false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    </script>

</body>
</html>



<?php
session_start();
require_once('../connection.php');


$UserID = $_SESSION["UserID"];
$Name = $_SESSION["Name"];
$Surname = $_SESSION["Surname"];
$Phone = $_SESSION["Phone"];
$Email = $_SESSION["Email"];
$Address = $_SESSION["Address"];
$Status = $_SESSION["Status"];

if ($Status != 'USER') {
    Header("Location: ../logout.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
<div class="container">
    <h1>Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
            </div>
        </div>

        <div class="col-md-9 personal-info">
            <h3>Personal info</h3>


            <form action="editprofile.php" method="post">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name : </label>
                        <?php echo $Name; ?>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Surname : </label>
                        <?php echo $Surname; ?>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email : </label>
                        <?php echo $Email; ?>
                </div>

                <div class="form-group ">
                    <label class="col-lg-3 control-label">Phone : </label>
                        <?php echo $Phone; ?>

                </div>

                <div class="form-group ">
                    <label class="col-lg-3 control-label">Address : </label>

                        <?php echo $Address; ?>

                    
                </div>

                <input type="hidden" name="UserID" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-success" value="Edit Profile">
                <a href="../logout.php" class="btn btn-default">Log out</a>

            </form>
        </div>
    </div>
</div>
<hr>
</body>
</html>
<?php
    //check value
    if(isset($_GET["UserID"]) && !empty($_GET["UserID"])){
        require_once '../connection.php';

        $sql = "SELECT * FROM member WHERE UserID = ?";

        if($stmt = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$param_id);

            $param_id = trim($_GET["UserID"]);

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["Name"];
                    $lname = $row["Surname"];
                    $phone = $row["Phone"];
                    $email = $row["Email"];
                    $address = $row["Address"];
                }
                else{
                    header("location: error.php");
                    exit();
                }
            }
            else{
                echo "Oops! something went wrong try again!";
            }

            mysqli_stmt_close($stmt);

        }

        mysqli_close($con);
        
    }
    else{
        header("location: error.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/21d9f8417f.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <h1>View User</h1>
    <hr>
    <div class="row">
        <!-- left column -->


        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <h3>Personal info</h3>


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name : <?php echo $row["Name"]; ?></label>

                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Surname : <?php echo $row["Surname"]; ?></label>

                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email : <?php echo $row["Email"]; ?></label>

                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone : <?php echo $row["Phone"]; ?></label>

                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Address : <?php echo $row["Address"]; ?></label>

                </div>


                <p><a href="manage_user.php" class="btn btn-primary">Back</a></p>


</body>
</html>
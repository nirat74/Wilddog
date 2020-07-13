<?php
        require_once('../connection.php');
        
        $id = trim($_POST['UserID']);
        $sql = "SELECT * FROM member WHERE UserID = '".$id."'";


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
    <h1>Edit User</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>

          <input type="file" class="form-control" id="photo">
        </div>
      </div>

      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        

        <form action="update.php<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
            <label class="col-lg-3 control-label">Name : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">

            </div>
          </div>

          <div class="form-group <?php echo (!empty($Surname_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Surname : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Surname" class="form-control" value="<?php echo $Surname; ?>">

            </div>
          </div>

          <div class="form-group <?php echo (!empty($Email_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Email : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Email" class="form-control" value="<?php echo $Email; ?>">

            </div>
          </div>

          <div class="form-group <?php echo (!empty($Phone_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Phone : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Phone" class="form-control" value="<?php echo $Phone; ?>">
 
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Address_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Address : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Address" class="form-control" value="<?php echo $Address; ?>">

            </div>
          </div>

          <input type="hidden" name="UserID" value="<?php echo $id; ?>">
            <input type="submit" class="btn btn-success" value="Submit">
            <a href="profile.php" class="btn btn-default">Cancel</a>

        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>


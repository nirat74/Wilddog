<?php
require_once 'C:\xampp\htdocs\Wilddog\connection.php';
$Name = $Surname = $Phone = $Email = $Address = $Password = "";
$Name_err = $Surname_err = $Phone_err = $Email_err = $Address_err = $Password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validate Name
        $input_Name = trim($_POST["Name"]);
        if(empty($input_Name)){
            $Name_err = "Please enter a Name.";
        }
        elseif (!filter_var(trim($_POST["Name"]),FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/"))))
        {
            $Name_err = "Please enter a Name.";
        }
        else{
            $Name = $input_Name;
        }

            //Validate Surname
            $input_Surname = trim($_POST["Surname"]);
            if(empty($input_Surname)){
                $Surname_err = "Please enter a Surname.";
            }
            elseif (!filter_var(trim($_POST["Surname"]),FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/"))))
            {
                $Surname_err = "Please enter a Surname.";
            }
            else{
                $Surname = $input_Surname;
            }
    
            //Validate Phone
            $input_Phone = trim($_POST["Phone"]);
            if(empty($input_Phone)){
                $Phone_err = "Please enter a Phone.";
            }
            elseif (!filter_var(trim($_POST["Phone"]),FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[0-9]+$/"))))
            {
                $Phone_err = "Please enter a Phone.";
            }
            else{
                $Phone = $input_Phone;
            }
    
            //Validate Email
            $input_Email = trim($_POST["Email"]);
            if(empty($input_Email)){
                $Email_err = "Please enter an Email.";
            }
            else{
                $Email = $input_Email;
            }
            
            //Validate Address
            $input_Address = trim($_POST["Address"]);
            if(empty($input_Address)){
                $Address_err = "Please enter an Address.";
            }
            else{
                $Address = $input_Address;
            }

            $input_Password = trim($_POST["Password"]);
            if(empty($input_Password)){
                $Password_err = "Please enter an Password.";
            }
            else{
                $Password = $input_Password;
            }

        //Check input error before insert into db
        if(empty($Name_err) && empty($Surname_err) && empty($Phone_err) && empty($Email_err) && empty($Address_err) && empty($Password_err)){
        // Prepare an insert statement
            $sql = "INSERT INTO member (Name,Surname,Phone,Email,Address,Password,Status,Active) VALUES (?,?,?,?,?,?,?,?)";

            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "ssssssss", $param_Name, $param_Surname, $param_Phone, $param_Email, $param_Address, $param_Password,'USER','No');

                $param_Name = $Name;
                    $param_Surname = $Surname;
                    $param_Phone = $Phone;
                    $param_Email = $Email;
                    $param_Address = $Address;
                    $param_Password = $Password;

                if(mysqli_stmt_execute($stmt)){
                    header("location: manage_user.php");
                    exit();
                }
                else{
                    echo "Oops! something went wrong try again!";
                }
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($con);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/21d9f8417f.js" crossorigin="anonymous"></script>
  </head>
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
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
            <label class="col-lg-3 control-label">Name : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
              <span class="help-block"><?php echo $Name_err; ?></span>
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Surname_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Surname : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Surname" class="form-control" value="<?php echo $Surname; ?>">
              <span class="help-block"><?php echo $Surname_err; ?></span>
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Email_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Email : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Email" class="form-control" value="<?php echo $Email; ?>">
              <span class="help-block"><?php echo $Email_err; ?></span>
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Phone_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Phone : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Phone" class="form-control" value="<?php echo $Phone; ?>">
              <span class="help-block"><?php echo $Phone_err; ?></span>
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Address_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Address : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Address" class="form-control" value="<?php echo $Address; ?>">
              <span class="help-block"><?php echo $Address_err; ?></span>
            </div>
          </div>

          <div class="form-group <?php echo (!empty($Password_err)) ? 'has-error' : ''; ?>">
          <label class="col-lg-3 control-label">Password : </label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Password" class="form-control" value="<?php echo $Password; ?>">
              <span class="help-block"><?php echo $Password_err; ?></span>
            </div>
          </div>

            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="manage_user.php" class="btn btn-default">Cancel</a>
            </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>
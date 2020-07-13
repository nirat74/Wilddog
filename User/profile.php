<?php 
	session_start(); 
	require_once('../connection.php');

	
	$UserID = $_SESSION["UserID"] ;
	$Name = $_SESSION["Name"] ;
	$Surname = $_SESSION["Surname"] ;
	$Phone = $_SESSION["Phone"] ;
	$Email = $_SESSION["Email"] ;
	$Address = $_SESSION["Address"] ;
	$Status = $_SESSION["Status"] ;

 	if($Status!='USER'){
    Header("Location:logout.php");  
  }  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="editprofile.php" method="post">
	<h1>User Page</h1>
	<h3> สวัสดี คุณ <?php echo $Email; ?> สถานะ <?php echo $Status; ?> </h3>
	<input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
            <input type="submit" class="btn btn-success" value="Submit">
	</form>
</body>
</html>
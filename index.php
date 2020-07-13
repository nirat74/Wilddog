<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LoginForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/21d9f8417f.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="wrapper" style="background-color: rgb(103, 151, 160);">
    <div class="inner">
        <div class="image-holder">
            <img src="images/8.jpg" alt="">
        </div>
        <form name="form-login" method="post" action="checklogin.php">
            <h3>Login Form</h3>
            <div class="form-wrapper">
                <input type="text" name="Email" placeholder="Email Address" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="Password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <button type="submit">Login
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>

        <a href="register.php">Register</a>
    </div>
</div>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
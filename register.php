<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper" style="background-color: rgb(103, 151, 160);">
    <div class="inner">
        <div class="image-holder">
            <img src="images/8.jpg" alt="">
        </div>

        <form name="form-register" method="post" action="sendmail.php" id="register" method="post" novalidate>
            <h3>Registration Form</h3>
            <div class="form-group">
                <input type="text" placeholder="Name" class="form-control" pattern="^[a-zA-Z\s]+$" name="Name"
                       id="input_name"
                             autocomplete="off" value=""   required><br>

                <input type="text" placeholder="Surname" class="form-control" pattern="^[a-zA-Z\s]+$" name="Surname"
                       id="input_surname"
                             autocomplete="off" value=""   required><br>

            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Phone" class="form-control" pattern="^0([8|9|6])([0-9]{8}$)"
                       name="Phone" id="input_tel"
                             autocomplete="off" value=""   required>
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Email Address" class="form-control" name="Email" id="input_email"
                             pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                             autocomplete="off" value="" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <textarea placeholder="Address" class="form-control" name="Address" id="textarea_address"
                          autocomplete="off" value="" required></textarea>
            </div>
            <div class="form-wrapper">
                <input type="password" name="Password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="Confirm" placeholder="Confirm Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <button type="submit">Register
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>

        <a href="index.php">Login</a>
    </div>
</div>

<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#register").on("submit", function () {
            var form = $(this)[0];
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
</script>
</body>
</html>


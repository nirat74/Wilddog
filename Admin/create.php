<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
<div class="container">
    <h1>Add User</h1>
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
            <h3>Personal info</h3>

            <form name="form-register" action="../Admin/sendmail.php" method="post" id="register" method="post"
                  novalidate>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" pattern="^[a-zA-Z\s]+$" name="Name" id="input_name"
                               autocomplete="off" value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Surname : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" pattern="^[a-zA-Z\s]+$" name="Surname"
                               id="input_surname" autocomplete="off" value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" pattern="^0([8|9|6])([0-9]{8}$)" name="Phone"
                               id="input_phone" autocomplete="off" value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email Address : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                               name="Email" id="input_email" autocomplete="off" value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Address : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="Address" id="input_address" autocomplete="off"
                               value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Password : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="Password" id="password1" autocomplete="off"
                               value=""   required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm Password : </label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password" name="Confirm" id="password2" autocomplete="off"
                               value=""   required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Add</button>
                <a href="manage_user.php" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#register").on("submit", function () {
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



<?php
if (isset($_GET["UserID"]) && !empty($_GET["UserID"])) {
    require_once '../connection.php';

    $id = $_GET["UserID"];
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            .wrapper {
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="delete_user.php" method="post">
                        <div class="alert alert-danger fade in">
                            <p>ต้องการลบผู้ใช้งานออกหรือไม่?</p>

                            <p>
                                <input type="hidden" name="UserID" value="<?php echo $id; ?>">
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="../Admin/manage_user.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>



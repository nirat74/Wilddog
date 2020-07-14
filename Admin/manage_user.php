<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <style>
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            magin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        .btn {
            margin: 5px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">User Details</h2>
                    <a href="../logout.php" class="btn btn-warning pull-right">
                        Logout
                    </a>
                    <a href="Export.php" class="btn btn-info pull-right">
                        Export User
                    </a>
                    <a href="create.php" class="btn btn-success pull-right">
                        Add New User
                    </a>
                </div>
                <?php
                require_once '../connection.php';

                $sql = "SELECT * FROM member";
                if ($result = mysqli_query($con, $sql)){
                if (mysqli_num_rows($result) > 0){
                ?>
                <table class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Activate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['UserID'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Surname'] . "</td>";
                        echo "<td>" . $row['Phone'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Address'] . "</td>";
                        echo "<td>" . $row['Photo'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['Active'] . "</td>";

                        echo "<td>";
                        echo "<a href='read.php?UserID=" . $row['UserID'] . "' title='View' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update.php?id=" . $row['UserID'] . "' title='Update' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='delete.php?UserID=" . $row['UserID'] . "' title='Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";

                    mysqli_free_result($result);
                    }
                    else {
                        echo "<p class = 'lead'><em> ไม่พบข้อมูล </em></p>";
                    }
                    }

                    mysqli_close($con);

                    ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
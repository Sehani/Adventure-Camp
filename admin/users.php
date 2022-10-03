<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
<?php include_once "inc/connection.php" ?>

<head>
    <title>Dashboard | Olympia Adventure Camp</title>
    <?php include "inc/head.php"; ?>

</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <?php include_once "inc/navbar.php" ?>
        <!-- END NAVBAR -->

        <!-- LEFT SIDEBAR -->
        <?php include_once "inc/sidebar.php" ?>
        <!-- END LEFT SIDEBAR -->

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Customer Management</h3>
                    <!-- TABLE STRIPED -->
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Satuts</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM usertable";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php if ($row["status"] == "verified") {
                                                        echo "<span class='label label-success'>verified</span>";
                                                    } else {
                                                        echo "<span class='label label-danger'>not verified</span>";
                                                    } ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#exampleModalCenter<?php echo $row["id"] ?>"><i
                                                    class="fa fa-eye"></i></button>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $row["id"] ?>"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Customer Info
                                                        <?php echo $row["id"] ?> </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="customerName">Customer Name</label>
                                                    <input type="text" class="form-control" name="customerName"
                                                        value="<?php echo $row["name"] ?>">
                                                    <br>
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?php echo $row["email"] ?>">
                                                    <br>
                                                    <label for="status">Status</label> : <?php if ($row["status"] == "verified") {
                                                                                                        echo "<span class='label label-success'>verified</span>";
                                                                                                    } else {
                                                                                                        echo "<span class='label label-danger'>not verified</span>";
                                                                                                    } ?> <br><br>
                                                    <label for="password">Change Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        value="<?php echo $row["password"] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Update
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    } else {
                                        ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger" role="alert">
                                           No Record Found!
                                        </div>

                                    </div>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE STRIPED -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <!-- FOOTER  -->
        <?php include_once "inc/footer.php" ?>

    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <?php include_once "inc/scripts.php" ?>
</body>

</html>
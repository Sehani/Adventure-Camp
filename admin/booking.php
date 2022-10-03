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
                    <h3 class="page-title">Bookings</h3>
                    <!-- TABLE STRIPED -->
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Customer Name</th>
                                        <th>Paid Status</th>
                                        <th>Deu Amount</th>
                                        <th>Contact Details</th>
                                        <th>Ararrival Date</th>
                                        <th>Departure Date</th>
                                        <th>Add Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM booking ORDER BY `booking`.`booking_id` DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row["booking_id"] ?></td>
                                                <td><?php echo $row["first_name"] . " " . $row["last_name"] ?></td>
                                                <td><?php if ($row["paid_status"] == "paid") {
                                                        echo "<span class='label label-success'>paid</span>";
                                                    } else {
                                                        echo "<span class='label label-danger'>not paid</span>";
                                                    } ?> </td>
                                                <td><?php echo $row["due_amount"] ?></td>
                                                <td><?php echo $row["email"] . "<br/>" . $row["contact_number"] ?></td>
                                                <td><?php echo $row["check_in_date"] ?></td>
                                                <td><?php echo $row["check_out_date"] ?></td>
                                                <td><?php echo $row["add_date"] ?></td>

                                                <td>
                                                    <a href="booking_edit.php?bid=<?php echo $row["booking_id"] ?>" class="btn btn-info">Edit</a>
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>

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
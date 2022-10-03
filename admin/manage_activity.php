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
                    <h3 class="page-title">Activity Management</h3>
                    <!-- TABLE STRIPED -->
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Activity Name</th>
                                        <th>Price($)</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM camp_activity";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["aid"] ?></td>
                                        <td><?php echo $row["ac_name"] ?></td>
                                        <td><?php echo $row["ac_price"] ?></td>
                                        <td><?php if ($row["ac_status"] == "active") {
                                                        echo "<span class='label label-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='label label-danger'>Inactive</span>";
                                                    } ?> </td>
                                        <td>
                                            <a href="activity_edit.php?aid=<?php echo $row["aid"]?>" class="btn btn-info" >Edit</a>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
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
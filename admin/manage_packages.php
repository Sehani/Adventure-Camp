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
                    <h3 class="page-title">Packeges</h3>
                    <!-- TABLE STRIPED -->
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Package Name</th>
                                        <th>Price($)</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Satuts</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM packages";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["pack_name"] ?></td>
                                        <td><?php echo $row["pack_price"] ?></td>
                                        <td><?php echo $row["pack_type"] ?></td>
                                        <td><img src="<?php echo $row["pack_img"] ?>" width="60" alt=""></td>
                                        <td><?php if ($row["pack_status"] == "active") {
                                                        echo "<span class='label label-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='label label-danger'>Inactive</span>";
                                                    } ?> </td>
                                                    
                                        <td>
                                            <a href="package_edit.php?pid=<?php echo $row["id"]?>" class="btn btn-info" >Edit</a>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </td>                                     
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        ?>
                                           <div class="alert alert-danger" role="alert">
                                           No Record Found!
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
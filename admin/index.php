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
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-user"></i></span>
                                        <p>
                                            <span class="number">1,252</span>
                                            <span class="title">Registered User</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-book"></i></span>
                                        <p>
                                            <span class="number">203</span>
                                            <span class="title">Bookings</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                            <span class="number">35%</span>
                                            <span class="title">Toatal Packages</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
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
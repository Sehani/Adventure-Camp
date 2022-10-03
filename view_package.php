<?php
include_once "inc/connection.php";

$package_id = $_GET["pack_id"];
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Activities</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>

<body>
    <!-- Header-->

    <header>

        <div class="header-area">

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="#"> <img src="img/logo.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>

                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="Index.php" class="active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Packages.php">Packages</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a href="Price.php" class="nav-link"> Accomodation</a>
                                <div class="dropdown-content">
                                    <a href="Accomodation.php"> Accomodation</a> <br>
                                    <a href="Meals.php"> Meals</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Activities.php">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Covid-19.php">Covid-19</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Feedback.php">Feedback</a>
                        </li>
                    </ul>
                </div>
        </div>

        </nav>
        </div>

    </header>

    <div class="banner-3">
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> OA -Package Details</h1>
        </div>
    </div>
    <!--- /banner ---->

    <?php

    $sql_pack = "SELECT * FROM packages WHERE id='$package_id'";
    $result_pack = mysqli_query($conn, $sql_pack);
    $row_pack = mysqli_fetch_assoc($result_pack);

    if (mysqli_num_rows($result_pack) > 0) {
        // output data of each row
    ?>
        <div class="selectroom">
            <div class="container">
                <div class="selectroom_top">
                    <div class="row">
                        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                            <img src="<?php echo "admin/" . $row_pack["pack_img"]; ?>" class="img-responsive" alt="" width="310px">
                        </div>
                        <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                            <h2><?php echo $row_pack["pack_name"] . "<span style='font-size: 18px; padding-left: 15px;'>(Permium)</span>"; ?></h2>
                            <p class="dow">#PKG-<?php echo $row_pack["id"]; ?></p>
                            <p><b>Package Type : <?php echo $row_pack["pack_type"] ?></b> </p>
                            <p><b>Package Location :</b> Local</p>
                            <p><b>Activity : 
                            <?php
                            $sql_packid = "SELECT * FROM `packages_activity_list` WHERE `package_id` = '$package_id'";
                            $result_packid = mysqli_query($conn, $sql_packid);
                            while ($row_active = mysqli_fetch_assoc($result_packid)) {
                                $active_id = $row_active["activity_id"];

                                $sql_active = "SELECT * FROM camp_activity WHERE aid= '$active_id'";
                                $result_active = mysqli_query($conn, $sql_active);

                                if (mysqli_num_rows($result_active) > 0) {
                                    // output data of each row
                                    while ($row_active = mysqli_fetch_assoc($result_active)) {
                            ?>
                                        <?php echo $row_active["ac_name"]." , "; ?>
                            <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                            ?>
                            </b></p>
                            <div class="clearfix"></div>
                            <div class="grand">
                                <p>Grand Total:</p>
                                <h3>USD.<?php echo $row_pack["pack_price"] ?></h3>
                            </div>
                        </div>
                    </div>
                    <h3>Package Details</h3>
                    <p style="padding-top: 1%"><?php echo $row_pack["pack_details"]; ?> </p>
                    <div class="clearfix"></div>
                    <div class="col-md-12 text-center">                
                       <a href="booking-form.php?pack_id=<?php echo $package_id?>&packPirce=<?php echo $row_pack["pack_price"] ?>" class="btn btn-warning">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- selectroom -->
    <?php


    } else {
        echo "0 results";
    }
    ?>



    <br> <br> <br>
    <footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <a href="index.html" class="footer-logo">
                            <img src="img/logo.png" alt="footer_logo" class="img-fluid">
                        </a>
                        <p class="footer-info-text">
                            Olympia Adventure Camp
                        </p>
                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">

                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>

                                <div class="contact-info">
                                    <h3>Our Address</h3>
                                    <p>123, Kandy Road<br>
                                        Matale<br>
                                        Sri Lanka<br></p>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>

                                <div class="contact-info">
                                    <h3>+94 1234 5673</h3>
                                    <p>Give us a call</p>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-12 col-lg-6">
                        <div class="footer-widget">
                            <div class="section-heading">
                                <h3 class="fj">Join with us</h3>
                                <span class="animate-border border-white"></span>
                            </div>
                            <p class="fp">We have been working with Adventure World for a number of years. This is
                                evident in the consistently outstanding feedback we receive from many of the people we
                                deal with.<br>Plan your adventure and enjoy eith us.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

        <div id="part2">
            <p id="txt6"><i class="material-icons tiny"> copyright</i>@ 2021 Olympia Adventure Camp - All right reserved
            </p>
        </div>


        </div>

        <div id="back-to-top" class="back-to-top">
            <p>Best Adventure Camp Company 2021</p>
        </div>



    </footer>



    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js" integrity="sha512-kwz4O9ZHi+MTJEvhjK8qC88n0+J1Hfh3o85NYJAuaZbLffDsrZxMhwi3Htzn3MVrttScMCIFz/O2KEyF9Ho/eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
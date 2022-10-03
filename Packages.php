<?php 
session_start();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <title>Activities</title>
    <?php include 'inc/head.php'; ?>
</head>

<body>



    <!-- Header-->

    <header>
        <div class="header-area">
        <?php include 'inc/navbar.php'; ?>
        <?php include 'inc/connection.php'; ?>
        </div>  
    </header>

    <main>

        <div class="slider-area">
            <div class="slider-active">
                <div id="carousel" class="carousel slide hero-slides" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carousel" data-slide-to="0"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active land">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft"><b>Land Activities<b></h2>
                                            <p class="animated fadeInRight">Plan your adventure <br> Here at Adventure
                                                World Camps we promote physical activity and a healthy lifestyle through
                                                play and adventure</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item air">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft"><b>Air Activities<b></h2>
                                            <p class="animated fadeInRight">Plan your adventure <br> Here at Adventure
                                                World Camps we promote physical activity and a healthy lifestyle through
                                                play and adventure</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item water">
                            <div class="container h-100 d-none d-md-block">
                                <div class="row align-items-center h-100">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                        <div class="caption animated fadeIn">
                                            <h2 class="animated fadeInLeft"><b>Water Activities<b></h2>
                                            <p class="animated fadeInRight"> Whether you are an experienced outdoor
                                                enthusiast, or new to camp life, Adventure Camp will be the highlight of
                                                your days!</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
            <br>
    </main>


    <br> <br> <br>
    <div class="demo">
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT * FROM packages";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $package_id = $row["id"];

                ?>

                        <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                            <div class="pricingTable blue">
                                <div class="pricingTable-header">
                                    <h3 class="title"><?php echo $row["pack_name"]; ?></h3>
                                    <h5>(<?php echo $row["pack_type"]; ?>)</h5>
                                </div>
                                <div class="price-value">
                                    <span class="amount">$<?php echo $row["pack_price"]; ?></span>
                                </div>
                                <div class="pic1" style="background-image: url('admin/<?php echo $row["pack_img"]; ?>');">
                                    <ul class="pricing-content">
                                        <?php
                                        $sql_activity = "SELECT * FROM packages_activity_list WHERE package_id = '$package_id'";
                                        $result_activity = mysqli_query($conn, $sql_activity);

                                        if (mysqli_num_rows($result_activity) > 0) {
                                            // output data of each row
                                            while ($row_activity = mysqli_fetch_assoc($result_activity)) {
                                                $activity_id = $row_activity["activity_id"];

                                                $sql_active = "SELECT * FROM `camp_activity` WHERE aid='$activity_id'";
                                                $result_active = mysqli_query($conn, $sql_active);
                                                $row_active = mysqli_fetch_assoc($result_active);
                                        ?>

                                                <li><?php echo $row_active["ac_name"] ?></li>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>

                                    <div class="pricingTable-book">
                                        <a href="view_package.php?pack_id=<?php echo $package_id ?>">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>


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
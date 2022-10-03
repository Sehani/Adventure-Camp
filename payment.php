<?php
session_start();

if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
} else {
    header("Location: login-user.php");
}

include_once "inc/connection.php";
include "function.php";

$bookID = $_GET["bookID"];
$activyPrice = 0;
$extraActPrice = 0;
$date = date('Y-m-d H:i:s');



?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <title>Payment</title>
    <?php include "inc/head.php" ?>
</head>

<body>
    <!-- Header-->

    <header>
        <div class="header-area">
            <?php include "inc/navbar.php" ?>
        </div>
    </header>

    <div class="banner-3">
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> OA -Payment Details</h1>
        </div>
    </div>
    <!--- /banner ---->

    <?php

    $sql_pack = "SELECT * FROM booking WHERE booking_id='$bookID'";
    $result_pack = mysqli_query($conn, $sql_pack);
    $row_pack = mysqli_fetch_assoc($result_pack);

    if (mysqli_num_rows($result_pack) > 0) {

        $roomID = $row_pack["room_type"];
        $roomCount = $row_pack["no_of_rooms"];

        $mealID = $row_pack["meals_type"];

        $tentID = $row_pack["tent_type"];
        $tentCount = $row_pack["no_of_tents"];


        // output data of each row
        $pack_id = $row_pack["pack_id"];

        $sql_packName = "SELECT * FROM packages WHERE id='$pack_id'";
        $result_packName = mysqli_query($conn, $sql_packName);
        $row_packName = mysqli_fetch_assoc($result_packName);

        $packName = $row_packName["pack_name"];
        $packPrice = $row_packName["pack_price"];



    ?>
        <div class="selectroom">
            <div class="container">
                <div class="selectroom_top">
                    <div class="row">
                        <div class="col-md-8 offset-2 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                            <h2><?php echo $row_pack["first_name"] . " " . $row_pack["last_name"]; ?></h2>
                            <p class="dow">#PKG-<?php echo $packName; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Package Type : <?php echo $pack_id ?></b> </p>
                                    <p><b>Package Location :</b>Local</p>
                                    <p><b>Contact Number :</b><?php echo $row_pack["contact_number"] ?></p>
                                    <p><b>Email :</b><?php echo $row_pack["email"] ?></p>
                                    <p><b>Date Arravial :</b><?php echo $row_pack["check_out_date"] ?></p>
                                    <p><b>Activity Included:
                                            <?php
                                            $sql_packid = "SELECT * FROM `packages_activity_list` WHERE `package_id` = '$pack_id'";
                                            $result_packid = mysqli_query($conn, $sql_packid);
                                            while ($row_active = mysqli_fetch_assoc($result_packid)) {
                                                $active_id = $row_active["activity_id"];

                                                $sql_active = "SELECT * FROM camp_activity WHERE aid= '$active_id'";
                                                $result_active = mysqli_query($conn, $sql_active);

                                                if (mysqli_num_rows($result_active) > 0) {
                                                    // output data of each row

                                                    while ($row_active = mysqli_fetch_assoc($result_active)) {
                                                        $activyPrice += $row_active['ac_price'];
                                            ?>
                                                        <?php echo $row_active["ac_name"] . " , "; ?>
                                            <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                            }
                                            ?>
                                        </b></p>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Date Depautre :</b><?php echo $row_pack["check_in_date"] ?></p>
                                    <p><b>Number of People :</b><?php echo $row_pack["no_of_people"] ?></p>
                                    <p><b>Room Type :</b> <?php echo roomName($roomID); ?></p>
                                    <p><b>Tent Type:</b><?php echo tentName($tentID) ?></p>
                                    <p><b>Meal Type :</b><?php echo mealName($mealID) ?></p>
                                    <p><b>Extra Activity Included:
                                            <?php
                                            $sql_extra = "SELECT * FROM `booking_activity` WHERE `book_id` = '$bookID'";
                                            $result_extra = mysqli_query($conn, $sql_extra);
                                            while ($row_extra = mysqli_fetch_assoc($result_extra)) {
                                                $acID = $row_extra["activity_id"];

                                                $sql_extra_act = "SELECT * FROM camp_activity WHERE aid= '$acID'";
                                                $result_extra_act = mysqli_query($conn, $sql_extra_act);

                                                if (mysqli_num_rows($result_extra_act) > 0) {
                                                    // output data of each row

                                                    while ($row_extra_act = mysqli_fetch_assoc($result_extra_act)) {
                                                       $extraActPrice += $row_extra_act['ac_price'];
                                            ?>
                                                        <?php echo $row_extra_act["ac_name"] . " , "; ?>
                                            <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                            }
                                            ?>
                                        </b></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="grand">
                                <div class="col-md-6">
                                    <table class="table" style="border: 1px solid #dee2e6;">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Packge Price</th>
                                                <td style="text-align: right;">USD.<?php echo $packPrice ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Room Charge</th>
                                                <td style="text-align: right;">USD.
                                                    <?php echo roomPrice($roomID, $roomCount); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Meal Charge</th>
                                                <td style="text-align: right;">USD. <?php echo mealPrice($mealID) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Tent Charge</th>
                                                <td style="text-align: right;">USD. <?php echo tentPrice($tentID, $tentCount); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Extra Activity Charge</th>
                                                <td style="text-align: right;">USD. <?php echo $extraActPrice;?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="border-right: 1px solid #dee2e6;">Total Charge</th>
                                                <td style="text-align: right;">USD.<?php echo $row_pack["due_amount"] + $extraActPrice?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>Grand Total:</p>
                                <h3>USD.<?php echo $row_pack["due_amount"] + $extraActPrice?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" id="amount" value="<?php echo $row_pack["due_amount"];  ?>">
                    <input type="hidden" id="bookID" value="<?php echo $row_pack["booking_id"] ?>">
                    <input type="hidden" id="packName" value="<?php echo $pack_id ?>">
                    <input type="hidden" id="fname" value="<?php echo $row_pack["first_name"] ?>">
                    <input type="hidden" id="lname" value="<?php echo $row_pack["last_name"] ?>">
                    <input type="hidden" id="custName" value="<?php echo $row_pack["first_name"] . " " . $row_pack["last_name"]; ?>">
                    <input type="hidden" id="custID" value="<?php echo $row_pack["customer_id"] ?>">
                    <input type="hidden" id="extraAct" value="<?php echo $extraActPrice ?>">
                    <input type="hidden" name="" value="">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-warning" id="payhere-payment">Confirm</button>
                    </div>
                    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                    <script>
                        var amount = $("#amount").val();
                        var extraActPrice = $("#extraAct").val();
                        var totAmount = parseInt(amount) + parseInt(extraActPrice);
                        var packName = $("#packName").val();
                        var custName = $("#custName").val();
                        var fname = $("#fname").val();
                        var lname = $("#lname").val();
                        var bookID = $("#bookID").val();
                        console.log (totAmount);
                        // Called when user completed the payment. It can be a successful payment or failure
                        payhere.onCompleted = function onCompleted(orderId) {
                            console.log("Payment completed. OrderID:" + orderId);
                            //Note: validate the payment and show success or failure page to the customer  
                            $.ajax({
                                type: 'POST',
                                url: 'update_payment.php',
                                data: {
                                    bookID: bookID,
                                    amount: totAmount,
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // redirect to google after 1 seconds
                                    window.setTimeout(function() {
                                        window.location.href = 'myaccount.php';
                                    }, 1000);
                                },
                            });

                        };

                        // Called when user closes the payment without completing
                        payhere.onDismissed = function onDismissed() {
                            //Note: Prompt user to pay again or show an error page
                            console.log("Payment dismissed");
                        };

                        // Called when error happens when initializing payment such as invalid parameters
                        payhere.onError = function onError(error) {
                            // Note: show an error page
                            console.log("Error:" + error);
                        };

                        // Put the payment variables here
                        var payment = {
                            "sandbox": true,
                            "merchant_id": "1217588", // Replace your Merchant ID
                            "return_url": undefined, // Important
                            "cancel_url": undefined, // Important
                            "notify_url": "notify.php",
                            "order_id": bookID,
                            "items": packName,
                            "amount": totAmount,
                            "currency": "USD",
                            "first_name": fname,
                            "last_name": lname,
                            "email": "samanp@gmail.com",
                            "phone": "0771234567",
                            "address": "No.1, Galle Road",
                            "city": "Colombo",
                            "country": "Sri Lanka",
                            "delivery_address": "No. 46, Galle road, Kalutara South",
                            "delivery_city": "Kalutara",
                            "delivery_country": "Sri Lanka",
                            "custom_1": "",
                            "custom_2": ""
                        };

                        // Show the payhere.js popup, when "PayHere Pay" is clicked
                        document.getElementById('payhere-payment').onclick = function(e) {
                            payhere.startPayment(payment);
                        };
                    </script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js" integrity="sha512-kwz4O9ZHi+MTJEvhjK8qC88n0+J1Hfh3o85NYJAuaZbLffDsrZxMhwi3Htzn3MVrttScMCIFz/O2KEyF9Ho/eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
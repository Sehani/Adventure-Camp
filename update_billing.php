<?php
session_start();


if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
} else {
    header("Location: login-user.php");
}

include 'inc/connection.php';
$bookID = $_GET["bookID"];

$sql = "SELECT * FROM `booking` WHERE booking_id='$bookID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {

    $packID = $row["pack_id"];
?>

    <!DOCTYPE html>
    <html class="no-js" lang="zxx">

    <head>
        <title>Booking</title>
        <?php include "inc/head.php" ?>
    </head>

    <body>



        <!-- Header-->

        <header>

            <div class="header-area">
                <?php include "inc/navbar.php"; ?>
            </div>

        </header>
        <div id="main">
            <div class="container">
                <div class="row pb-5 pt-5">
                    <div class="col-md-8 offset-2">
                        <form class="form-group" class="form" name="updateFrm" id="updateFrm">
                            <div id="form">
                                <h1 class="text-white text-center mt-4 mb-4">Update Booking Info</h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="content">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <lable><b> First Name:</b></lable>
                                            <input type="text" id="input-group" name="First_name" placeholder="" value="<?php echo $row["first_name"]; ?>" required>
                                        </div>
                                        <div id="content">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <lable><b> Last Name:</b></lable>
                                            <input type="text" id="input-group" name="Last_name" placeholder="" value="<?php echo $row["last_name"]; ?>" required>
                                        </div>
                                        <div id="content">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <lable><b> Contact Number:</b></lable>
                                            <input type="tel" id="input-group" name="contact_number" placeholder="" value="<?php echo $row["contact_number"]; ?>" required>
                                        </div>
                                        <div id="content pb-4">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <lable><b> Email:</b></lable>
                                            <input type="email" id="input-group" name="email" placeholder="" value="<?php echo $row["email"]; ?>" required>
                                        </div>
                                        <h5 class="pt-4">Accommodation Type</h5>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <lable><b> Rooms:</b></lable>
                                                <select class="form-control w-100 input-box form-rounded" name="Room_type">
                                                    <?php
                                                    $sql_rooms = "SELECT * FROM rooms";
                                                    $result_rooms = mysqli_query($conn, $sql_rooms);

                                                    if (mysqli_num_rows($result_rooms) > 0) {
                                                        // output data of each row
                                                        while ($row_rooms = mysqli_fetch_assoc($result_rooms)) {
                                                    ?>
                                                            <option value="<?php echo $row_rooms["id"] ?>"><?php echo $row_rooms["Room_type"] ?></option>

                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <lable><b> Tents:</b></lable>
                                                <select class="form-control w-100 input-box form-rounded" name="Tent_type">
                                                    <?php
                                                    $sql_tent = "SELECT * FROM tent";
                                                    $result_tent = mysqli_query($conn, $sql_tent);

                                                    if (mysqli_num_rows($result_tent) > 0) {
                                                        // output data of each row
                                                        while ($row_tent = mysqli_fetch_assoc($result_tent)) {
                                                    ?>
                                                            <option value="<?php echo $row_tent["id"] ?>"><?php echo $row_tent["Tent_type"] ?></option>

                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <lable><b> Meals:</b></lable>
                                                <select class="form-control w-100 input-box form-rounded" name="Meals_type">
                                                    <?php
                                                    $sql_meal = "SELECT * FROM meals";
                                                    $result_meal = mysqli_query($conn, $sql_meal);

                                                    if (mysqli_num_rows($result_meal) > 0) {
                                                        // output data of each row
                                                        while ($row_meal = mysqli_fetch_assoc($result_meal)) {
                                                    ?>
                                                            <option value="<?php echo $row_meal["id"] ?>"><?php echo $row_meal["Meals_type"] ?></option>

                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="bookID" value="<?php echo $bookID; ?>">
                                    <input type="hidden" name="cust_id" value="<?php echo $row["customer_id"]; ?>">
                                    <div class="col-md-6">
                                        <div id="content">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <lable><b> Check Arrival Date:</b></lable>
                                            <input type="date" id="input-group" name="check_in_date" data-date-format="mm-dd-yyyy" placeholder="" value="<?php echo $row["check_in_date"]; ?>" min="" required>
                                        </div>
                                        <div id="content">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <lable><b> Check Departure Date:</b></lable>
                                            <input type="date" id="input-group" name="check_out_date" data-date-format="mm-dd-yyyy" placeholder="" value="<?php echo $row["check_out_date"]; ?>" min="" required>
                                        </div>
                                        <div id="content">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <lable><b> No.of Guests:</b></lable>
                                            <input type="number" id="input-group" name="no_of_guest" placeholder="" value="<?php echo $row["no_of_people"]; ?>" min="1" max="100" required>
                                        </div>
                                        <div id="content" class="mb-2">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <lable><b> Packages:</b></lable> <br>
                                            <select id="input-group" name="Packages" style="background-color: white; padding: 10px; width: 100%;">
                                                <?php
                                                $sql_package = "SELECT * FROM `packages`";
                                                $result_package = mysqli_query($conn, $sql_package);

                                                if (mysqli_num_rows($result_package) > 0) {
                                                    // output data of each row
                                                    while ($row_package = mysqli_fetch_assoc($result_package)) {
                                                        $packageID =  $row_package["id"];
                                                ?>
                                                        <option <?php if ($packID == $row_package["id"]) {
                                                                    echo "selected";
                                                                } else {
                                                                    echo "";
                                                                } ?> value="<?php echo $row_package["id"] ?>"><?php echo $row_package["pack_name"] ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div id="content" style="padding-top: 16px;">
                                            <input type="checkbox" class="form-check-input" id="checkActivites">
                                            <labe for="exampleCheck1"><b> Add More Activities</b></label>
                                                <br>
                                                <label for=""><b>Extra Activities</b></label>
                                                <select class="form-control js-states form-control" multiple="multiple" id="activitySelect" name="activitySelect[]" disabled>

                                                    <?php
                                                    $sql_extra = "SELECT * FROM `camp_activity` WHERE `ac_status` = 'active'";
                                                    $result_extra = mysqli_query($conn, $sql_extra);

                                                    if (mysqli_num_rows($result_extra) > 0) {
                                                        // output data of each row
                                                        while ($row_extra = mysqli_fetch_assoc($result_extra)) {
                                                    ?>
                                                            <option value="<?php echo $row_extra["aid"]; ?>"><?php echo $row_extra["ac_name"]; ?></option>
                                                    <?php

                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>


                                                </select>

                                                <script>
                                                    document.getElementById('checkActivites').onchange = function() {
                                                        document.getElementById('activitySelect').disabled = !this.checked;
                                                    };

                                                    $("#activitySelect").select2({
                                                        placeholder: "Select Activities",
                                                        allowClear: true
                                                    });
                                                </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mt-4">
                                    <button class="btn btn-primary" type="submit" value="" id="btnUpdate">Update Booking</button>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
            <script>
                $(document).ready(function() {

                    $("form[name='updateFrm']").validate({

                        rules: {
                            email: {
                                required: true
                            },
                            contact_number: {
                                required: true,
                                maxlength: 13,
                                minlength: 10,
                                digits: true
                            }

                        },
                        messages: {
                            email: {
                                required: "This field is required"
                            },

                            contact_number: {
                                required: "This field is required",
                                maxlength: "Invalid Format Digits",
                                minlength: "Number Should be atleast 10 Digits",
                                digits: "Only Numbers"
                            }

                        },

                        submitHandler: function(form) {

                            $("#btnUpdate").html('Saving ...');
                            $("#btnUpdate").prop('disabled', true);


                            $.ajax({
                                url: "update_billing_submit.php",
                                type: "POST",
                                data: new FormData(form),
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend: function() {

                                },
                                success: function(data) {
                                    $("#btnUpdate").html('Update Again');
                                    $("#btnUpdate").prop('disabled', false);
                                    swal("Good job!", "Successfully Updated!", "success");

                                },
                                error: function() {

                                }
                            });



                        }

                    });

                });
            </script>
        </div>
    <?php  } ?>
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
                            <p class="fp">We have been working with Adventure World for a number of years. This is evident in the consistently outstanding feedback we receive from many of the people we deal with.<br>Plan your adventure and enjoy eith us.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

        <div id="part2">
            <p id="txt6"><i class="material-icons tiny"> copyright</i>@ 2021 Olympia Adventure Camp - All right reserved</p>
        </div>


        </div>

        <div id="back-to-top" class="back-to-top">
            <p>Best Adventure Camp Company 2021</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js" integrity="sha512-kwz4O9ZHi+MTJEvhjK8qC88n0+J1Hfh3o85NYJAuaZbLffDsrZxMhwi3Htzn3MVrttScMCIFz/O2KEyF9Ho/eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>

    </html>
<?php
session_start();
include 'connection.php';

// if (!isset($_SESSION['userID'])) {
// 	header('Location: login-user.php');
// }
if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
    $pack_id = $_GET["pack_id"];
    $packPirce = $_GET["packPirce"];
} else {
    header("Location: login-user.php");
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <title>Booking New Adventure</title>
    <?php include 'inc/head.php' ?>
</head>

<body>
    <!-- Header-->
    <header>
        <div class="header-area">
            <?php include 'inc/navbar.php' ?>
        </div>
    </header>
    <?php
    $today = date('Y-m-d');
    ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-white text-center">Booking</h1>
                    <div class="row">
                        <div class="col-md-5 mx-auto">
                            <br>
                            <form class="form-group" name="bookingFrm" id="bookingFrm">
                                <div id="form">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <lable><b> Check Arrival Date:</b></lable>
                                            <input type="date" id="input-group" class="form-control input-box form-rounded" name="check_in_date" data-date-format="mm-dd-yyyy" placeholder="" value="" min="<?php echo $today; ?>"
                                            required>
                                        </div>
                                        <br>
                                        <div class="col-6 form-group">
                                            <div id="content">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <lable><b> Check Departure Date:</b></lable>
                                                <input type="date" id="input-group" class="form-control input-box form-rounded" name="check_out_date" data-date-format="mm-dd-yyyy" placeholder="" min="<?php echo $today; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="first-group">
                                        <h5><b>Personal Information</b></h5>
                                        <br>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <lable><b> First Name:</b></lable>
                                                <input type="text" id="input-group" class="form-control input-box form-rounded" name="First_name" placeholder="first name" required>
                                            </div>
                                            <br>
                                            <div id="content">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <lable><b> Last Name:</b></lable>
                                                <input type="text" id="input-group" class="form-control input-box form-rounded" name="Last_name" placeholder="last name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <lable><b> Contact Number:</b></lable>
                                            <input type="tel" id="input-group" class="form-control input-box form-rounded" name="contact_number" placeholder="Ex:0094123456789" pattern="[0]{1}[0-9]{12}" required>
                                        </div>
                                        <br>
                                        <div id="content">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <lable><b> Email:</b></lable>
                                            <input type="email" id="input-group" class="form-control input-box form-rounded" name="email" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <h5><b>Booking Information</b></h5>
                                <br>
                                <div id="content">
                                    <lable><b> Package Type:</b></lable>
                                    <select class="form-control" disabled>
                                        <?php
                                        $sql_select = "SELECT * FROM `packages` ORDER BY `pack_name` ASC";
                                        $result_select = mysqli_query($con, $sql_select);

                                        if (mysqli_num_rows($result_select) > 0) {
                                            // output data of each row
                                            while ($row_select = mysqli_fetch_assoc($result_select)) {
                                        ?>
                                                <option <?php if ($pack_id == $row_select["id"]) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $row_select["id"]; ?>"><?php echo $row_select["pack_name"]; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>

                                    </select>
                                    <input type="hidden" name="packid" value="<?php echo $pack_id; ?>">
                                    <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
                                    <input type="hidden" name="packPrice" value="<?php echo $packPirce; ?>">

                                    <br />

                                    <lable><b> Activities in Currently You Have:</b></lable>
                                    <br>
                                    <?php
                                    $sql_packid = "SELECT * FROM `packages_activity_list` WHERE `package_id` = '$pack_id'";
                                    $result_packid = mysqli_query($con, $sql_packid);
                                    while ($row_active = mysqli_fetch_assoc($result_packid)) {
                                        $active_id = $row_active["activity_id"];

                                        $sql_active = "SELECT * FROM camp_activity WHERE aid= '$active_id'";
                                        $result_active = mysqli_query($con, $sql_active);

                                        if (mysqli_num_rows($result_active) > 0) {
                                            // output data of each row
                                            while ($row_active = mysqli_fetch_assoc($result_active)) {
                                    ?>
                                                <span class="badge badge-primary"><?php echo $row_active["ac_name"]; ?></span>
                                    <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                    }
                                    ?>
                                    <br><br>
                                    <input type="checkbox" class="form-check-input" id="checkActivites">
                                    <labe for="exampleCheck1"><b> Add More Activities</b></label>

                                        <br><br>
                                        <label for=""><b>Extra Activities</b></label>
                                        <select class="form-control js-states form-control" multiple="multiple" id="activitySelect" name="activitySelect[]" disabled>

                                            <?php
                                            $sql_extra = "SELECT * FROM `camp_activity` WHERE `ac_status` = 'active'";
                                            $result_extra = mysqli_query($con, $sql_extra);

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
                                <br>
                                <h6>Accommodation Type</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <lable><b> Rooms:</b></lable>
                                        <select class="form-control w-100 input-box form-rounded" name="Room_type" id="Room_type">
                                            <?php
                                            $sql_rooms = "SELECT * FROM rooms";
                                            $result_rooms = mysqli_query($con, $sql_rooms);

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
                                    <div class="col-4">
                                        <lable><b> Tents:</b></lable>
                                        <select class="form-control w-100 input-box form-rounded" name="Tent_type" id="Tent_type">
                                            <?php
                                            $sql_tent = "SELECT * FROM tent";
                                            $result_tent = mysqli_query($con, $sql_tent);

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
                                    <div class="col-4">
                                        <lable><b> Meals:</b></lable>
                                        <select class="form-control w-100 input-box form-rounded" name="Meals_type" id="Meals_type">
                                            <?php
                                            $sql_meal = "SELECT * FROM meals";
                                            $result_meal = mysqli_query($con, $sql_meal);

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
                                <br>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <lable><b> No.of Rooms:</b></lable>
                                        <input type="number" id="input-group" class="form-control input-box form-rounded" name="no_of_rooms" placeholder="" min="0" max="10" required>
                                    </div>
                                    <div class="col-6 form-group" id="content">
                                        <lable><b> No.of Tents:</b></lable>
                                        <input type="number" id="input-group" class="form-control input-box form-rounded" name="no_of_tents" placeholder="" min="0" max="10" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <lable><b> Adults:</b></lable>
                                        <input type="number" class="form-control w-100 input-box form-rounded" name="adults" min="1" max="100" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <lable><b> Children:</b></lable>
                                        <input type="number" class="form-control w-100 input-box form-rounded" name="children" min="0" max="100" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" name="submit" value="" id="submit" class="btn btn-brown btn text-white">Confirm</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $("form[name='bookingFrm']").validate({

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

                    $("#savebt").html('Saving ...');
                    $("#savebt").prop('disabled', true);


                    $.ajax({
                        url: "process.php",
                        type: "POST",
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            $("#savebt").html('Save');
                            $("#savebt").prop('disabled', false);
                            swal("Good job!", "Successfully Updated!", "success");
                            window.setTimeout(function() {
                                //window.location.href = 'myaccount.php';
                            }, 3000);

                        },
                        error: function() {

                        }
                    });



                }

            });

        });
    </script>
    <br><br> <br>
    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/script.php'; ?>
</body>

</html>
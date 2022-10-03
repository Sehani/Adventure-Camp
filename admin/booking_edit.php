<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
}

include_once "inc/connection.php";

$bid = $_GET["bid"];

$sql_user = "SELECT * FROM `booking` WHERE booking_id='$bid'";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);

$first_name = $row_user["first_name"];
$last_name = $row_user["last_name"];
$email = $row_user["email"];
$contact_number = $row_user["contact_number"];
$no_of_rooms = $row_user["no_of_rooms"];
$no_of_rooms = $row_user["no_of_rooms"];
$no_of_tents = $row_user["no_of_tents"];
$no_of_people = $row_user["no_of_people"];
$adults = $row_user["adults"];
$childern = $row_user["childern"];
$room_type = $row_user["room_type"];
$tent_type = $row_user["tent_type"];
$meals_type = $row_user["meals_type"];
$check_in_date = $row_user["check_in_date"];
$check_out_date = $row_user["check_out_date"];
$add_date = $row_user["add_date"];
$status = $row_user["status"];


?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Booking Edit</title>
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
                    <!-- INPUTS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit booking</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-success" id="success" style="display: none;">
                                <strong>Success!</strong> booking Changed.
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <strong>Danger!</strong> Something went wrong.
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <form name="bookingEdit" id="bookingEdit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name ?>">
                                            <input type="hidden" name="bid" class="form-control" value="<?php echo $bid ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contact Number</label>
                                            <input type="text" name="contact_number" class="form-control" value="<?php echo $contact_number ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="pack_stuts">
                                                <option value="active">Active</option>
                                                <option value="cancel">Cancel</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of Rooms</label>
                                                    <input type="text" name="no_of_rooms" class="form-control" value="<?php echo $no_of_rooms ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of Tents</label>
                                                    <input type="text" name="no_of_tents" class="form-control" value="<?php echo $no_of_tents ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Adults</label>
                                                    <input type="text" name="adults" class="form-control" value="<?php echo $adults ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of People</label>
                                                    <input type="text" name="no_of_people" class="form-control" value="<?php echo $no_of_people ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Childern</label>
                                                    <input type="text" name="childern" class="form-control" value="<?php echo $childern ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Room types</label>
                                                    <input type="text" name="" disabled class="form-control" value="<?php echo $room_type ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Meals Type</label>
                                                    <input type="text" disabled name="" class="form-control" value="<?php echo $meals_type ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tent Type</label>
                                                    <input type="text" name="" disabled class="form-control" value="<?php echo $tent_type ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Check in Date</label>
                                                    <input type="text" name="check_in_date" disabled class="form-control" value="<?php echo $check_in_date ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Check Out Date</label>
                                                    <input type="text" name="check_out_date" disabled class="form-control" value="<?php echo $check_out_date ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Added Date</label>
                                                    <input type="text" name="add_date" disabled class="form-control" value="<?php echo $add_date ?>">
                                                </div>
                                            </div>
                                        </div>                              
                                        <button type="submit" id="updatebtn" class="btn btn-primary">Update</button>
                                    </form>
                                </div>

                            </div>
                            <script>
                                $(document).ready(function() {


                                    $("form[name='bookingEdit']").validate({

                                        rules: {

                                        },
                                        messages: {

                                        },

                                        submitHandler: function(form) {

                                            $("#editbtn").html('Uploading ...');
                                            $("#editbtn").prop('disabled', true);


                                            $.ajax({
                                                url: "booking_edit_submit.php",
                                                type: "POST",
                                                data: new FormData(form),
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                beforeSend: function() {

                                                },
                                                success: function(data) {
                                                    $("#editbtn").html('Add');
                                                    $("#editbtn").prop('disabled', false);
                                                    $("#bookingEdit")[0].reset()
                                                    $("#success").show();
                                                    setTimeout(function() {
                                                       // window.location.href = "booking.php"
                                                    }, 3000);
                                                },
                                                error: function() {
                                                    $("#error").show();

                                                }
                                            });
                                        }

                                    });

                                });
                            </script>


                        </div>
                    </div>
                    <!-- END INPUTS -->
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
<?php
session_start();
include 'inc/connection.php';
include 'function.php';

if (isset($_SESSION['userID'])) {
    $cust_id = $_SESSION['userID'];
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
                    <h2 class="booking_heading">My Booking Orders</h2>
                    <div class="selectroom_top">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Contact Info</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Payment Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_booking = "SELECT * FROM booking WHERE status != 'cancel'";
                                $reult_booking = mysqli_query($conn, $sql_booking);

                                if (mysqli_num_rows($reult_booking) > 0) {
                                    // output data of each row
                                    while ($row_booking = mysqli_fetch_assoc($reult_booking)) {
                                        $pack_id = $row_booking["pack_id"];

                                        $sql_pack = "SELECT * FROM packages WHERE id= '$pack_id'";
                                        $result_pack = mysqli_query($conn, $sql_pack);
                                        $row_pack = mysqli_fetch_assoc($result_pack);

                                        $packName = $row_pack["pack_name"];
                                        $packPrice = $row_pack["pack_price"];
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row_booking["booking_id"]; ?></th>
                                            <td><?php echo $row_booking["first_name"] . " " . $row_booking["last_name"]; ?></td>
                                            <td><?php echo $packName; ?></td>
                                            <td><?php echo "Mobile - " . $row_booking["contact_number"] . " <br> Email - " . $row_booking["email"]; ?></td>
                                            <td><?php if ($row_booking["paid_status"] == "paid") {
                                                    echo "<span class='badge badge-warning'>Paid</span>";
                                                } else {
                                                ?>
                                                    <a href="payment.php?bookID=<?php echo $row_booking["booking_id"] ?>" class="btn btn-warning btn-sm" style="margin-top: 6px;">Pay Now</a>
                                                <?php
                                                }  ?>
                                            </td>
                                            <td><?php echo "$". $row_booking["due_amount"]; ?></td>
                                            <td>
                                                <input type="hidden" id="bookID<?php echo $row_booking["booking_id"] ?>" name="bookID" value="<?php echo $row_booking["booking_id"] ?>">                                                
                                                <a href="update_billing.php?bookID=<?php echo $row_booking["booking_id"]; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <button id="btnCancel<?php echo $row_booking["booking_id"] ?>" class="btn btn-danger btn-sm">cancel</button>
                                            </td>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#btnCancel<?php echo $row_booking["booking_id"] ?>").on("click", function() {

                                                        var bookID = $("#bookID<?php echo $row_booking["booking_id"] ?>").val();
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: 'billing_cancel.php',
                                                            data: {
                                                                bookID: bookID
                                                            },
                                                            success: function(response) {
                                                                //  location.reload();
                                                            },
                                                        });
                                                    });
                                                });
                                            </script>
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
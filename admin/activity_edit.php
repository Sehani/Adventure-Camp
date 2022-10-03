<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }

  include_once "inc/connection.php";

$aid = $_GET["aid"];

  $sql_user = "SELECT * FROM `camp_activity` WHERE aid='$aid'";
  $result_user = mysqli_query($conn, $sql_user);
  $row_user = mysqli_fetch_assoc($result_user);

  $ac_name = $row_user["ac_name"];
  $ac_price = $row_user["ac_price"];
  $ac_status = $row_user["ac_status"];
  $ac_desc = $row_user["ac_desc"];


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
                    <!-- INPUTS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Activity</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-success" id="success" style="display: none;">
                                <strong>Success!</strong> Activity Changed.
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <strong>Danger!</strong> Something went wrong.
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <form name="activityEdit" id="activityEdit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activity Name</label>
                                            <input type="text" name="ac_name" class="form-control" value="<?php echo $ac_name ?>">
                                            <input type="hidden" name="aid" class="form-control" value="<?php echo $aid ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activity Price</label>
                                            <input type="text" name="ac_price" class="form-control"
                                                value="<?php echo $ac_price ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="ac_status">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label> 
                                            <textarea class="form-control" name="ac_desc" rows="3"><?php echo $ac_desc ?></textarea>
                                        </div>
                                        <button type="submit" id="updatebtn" class="btn btn-primary">Update</button>
                                    </form>
                                </div>

                            </div>
                            <script>
                            $(document).ready(function() {


                                $("form[name='activityEdit']").validate({

                                    rules: {
                                        Username: {
                                            required: true,
                                            remote: {
                                                url: "check_email.php",
                                                type: "post"
                                            }
                                        },

                                        Password: {
                                            required: true,
                                            minlength: 6
                                        },


                                    },
                                    messages: {
                                        Username: {
                                            required: "Please enter Username",
                                            remote: "Username already in use"
                                        },
                                        Password: {
                                            required: "Please enter password",
                                            minlength: "Password must have 6 characters"
                                        },



                                    },

                                    submitHandler: function(form) {

                                        $("#editbtn").html('Uploading ...');
                                        $("#editbtn").prop('disabled', true);


                                        $.ajax({
                                            url: "activity_edit_submit.php",
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
                                                $("#activityEdit")[0].reset()
                                                $("#success").show();
                                                setTimeout(function() {
                                                    window.location.href = "manage_activity.php"
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
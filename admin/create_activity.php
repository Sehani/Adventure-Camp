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
                    <!-- INPUTS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Create New Activity</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-success" id="success" style="display: none;">
                                <strong>Success!</strong> New Activity Created.
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <form name="activityForm" id="activityForm">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activity Name</label>
                                            <input type="text" name="ac_name" class="form-control"
                                                placeholder="ex. White Water Rafting">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Activity Price</label>
                                            <input type="text" name="ac_price" class="form-control"
                                                placeholder="ex. 250 US $">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="ac_status">
                                                <option selected value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control" name="ac_desc"
                                                placeholder="Short Description" rows="3"></textarea>
                                        </div>
                                        <button type="submit" id="addbtn" class="btn btn-primary">Add</button>
                                    </form>
                                </div>

                            </div>
                            <script>
                            $(document).ready(function() {


                                $("form[name='activityForm']").validate({

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

                                        $("#addbtn").html('Uploading ...');
                                        $("#addbtn").prop('disabled', true);


                                        $.ajax({
                                            url: "create_activity_submit.php",
                                            type: "POST",
                                            data: new FormData(form),
                                            contentType: false,
                                            cache: false,
                                            processData: false,
                                            beforeSend: function() {

                                            },
                                            success: function(data) {
                                                $("#addbtn").html('Add');
                                                $("#addbtn").prop('disabled', false);
                                                $("#activityForm")[0].reset()
                                                $("#success").show();
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
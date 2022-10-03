<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }
  include_once "inc/connection.php";
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
                            <h3 class="panel-title">Create New Package</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-success" id="success" style="display: none;">
                                <strong>Success!</strong> New Package Created.
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <form name="activityForm" id="activityForm">
                                        <div class="form-group pt-4">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Package Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="pack_name" class="form-control"
                                                    placeholder="ex. Package A">
                                            </div>
                                        </div>
                                        <div class="form-group pt-4">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Package Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="pack_type" class="form-control"
                                                    placeholder="ex.Family Package / Couple Package / per person">
                                            </div>
                                        </div>
                                        <div class="form-group pt-4">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Packege Activities</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select id="pack_activities" name="pack_activities[]" class="js-states form-control"  multiple="multiple" >
                                                    <?php
                                                    $sql_activity = "SELECT * FROM `camp_activity` WHERE `ac_status` = 'active'";
                                                    $resut_activity = mysqli_query($conn, $sql_activity);
                                                    
                                                    if (mysqli_num_rows($resut_activity) > 0) {
                                                      // output data of each row
                                                      while($row_activity = mysqli_fetch_assoc($resut_activity)) {
                                                        
                                                ?>
                                                    <option value="<?php echo $row_activity["aid"]?>"><?php echo $row_activity["ac_name"]?></option>
                                                    <?php 
                                                          }
                                                        } else {
                                                          echo "0 results";
                                                        }
                                                         ?>
                                                </select>
                                                <script>                                         
                                                $("#pack_activities").select2({
                                                    placeholder: "Select Activities",
                                                    allowClear: true
                                                });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group pt-4">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Packege Price</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="pack_price" class="form-control"
                                                    placeholder="ex. 150 (US $)">
                                            </div>
                                        </div>
                                        <div class="form-group pt-4">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Packege Details</label>
                                            </div>
                                            <div class="col-md-8 pb-4">
                                                <textarea class="form-control" name="pack_details" placeholder="ex. about package" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Packege Status</label>
                                            </div>
                                            <div class="col-md-8 pb-4">
                                                <select class="form-control" name="pack_status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Packege Image</label>
                                            </div>
                                            <div class="col-md-8 pb-4">
                                               <input type="hidden" value="" name="uploadImg" id="uploadImg">
                                                <input type="file" name="image" class="form-control" placeholder="ex. White Water Rafting">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center pt-4">
                                            <button type="submit" id="addbtn"
                                                class="btn btn-primary text-center">Add</button>
                                        </div>

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
                                            url: "create_package_submit.php",
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
                                                var selected = $('#pack_activities').val();
                                                 console.log(selected);
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
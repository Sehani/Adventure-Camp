<?php 
if (!isset($_SESSION)) {
    session_start();
  }
  
  if (!isset($_SESSION['userID'])) {
      header('Location: login.php');
  }

  include_once "inc/connection.php";

$pid = $_GET["pid"];

  $sql_user = "SELECT * FROM `packages` WHERE id='$pid'";
  $result_user = mysqli_query($conn, $sql_user);
  $row_user = mysqli_fetch_assoc($result_user);

  $pack_name = $row_user["pack_name"];
  $pack_price = $row_user["pack_price"];
  $pack_type = $row_user["pack_type"];
  $pack_details = $row_user["pack_details"];


?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Package Edit</title>
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
                            <h3 class="panel-title">Edit Package</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-success" id="success" style="display: none;">
                                <strong>Success!</strong> package Changed.
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <strong>Danger!</strong> Something went wrong.
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <form name="packageEdit" id="packageEdit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Name</label>
                                            <input type="text" name="pack_name" class="form-control" value="<?php echo $pack_name ?>">
                                            <input type="hidden" name="pid" class="form-control" value="<?php echo $pid ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Type</label>
                                            <input type="text" name="pack_type" class="form-control" value="<?php echo $pack_type ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Price</label>
                                            <input type="text" name="ac_price" class="form-control" value="<?php echo $pack_price ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="pack_stuts">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label> 
                                            <textarea class="form-control" name="pack_details" rows="3"><?php echo $pack_details ?></textarea>
                                        </div>
                                        <button type="submit" id="updatebtn" class="btn btn-primary">Update</button>
                                    </form>
                                </div>

                            </div>
                            <script>
                            $(document).ready(function() {


                                $("form[name='packageEdit']").validate({

                                    rules: {      

                                    },
                                    messages: {  

                                    },

                                    submitHandler: function(form) {

                                        $("#editbtn").html('Uploading ...');
                                        $("#editbtn").prop('disabled', true);


                                        $.ajax({
                                            url: "package_edit_submit.php",
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
                                                $("#packageEdit")[0].reset()
                                                $("#success").show();
                                                setTimeout(function() {
                                                  window.location.href = "manage_packages.php"
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
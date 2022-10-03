<?php 

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['userID'])) {
	header('Location: login.php');
}

include('inc/connection.php');

$user_id = $_SESSION['userID'];

$current_date = date("Y-m-d");  

$pack_name   = mysqli_real_escape_string($conn,$_POST['pack_name']);
$pack_type   = mysqli_real_escape_string($conn,$_POST['pack_type']);
// $pack_activities = mysqli_real_escape_string($conn,$_POST['pack_activities']);
$pack_activities = $_POST["pack_activities"];
$pack_price  = mysqli_real_escape_string($conn,$_POST['pack_price']);
$pack_details = mysqli_real_escape_string($conn,$_POST['pack_details']);
$pack_status = mysqli_real_escape_string($conn,$_POST['pack_status']);
$pack_img   = mysqli_real_escape_string($conn,$_POST['pack_img']);

 $activity_count         = count($_POST['pack_activities']);



//  img upload

if(!empty($_FILES['image']) ){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $expensions= array("jpeg","jpg","png","ico");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 520097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp, "userImage/".$file_name);
       
       $imagepath = "userImage/".$file_name;

       $sql_pack="INSERT INTO packages (pack_name, pack_type, pack_price, pack_details, pack_status, pack_img) VALUES ('$pack_name','$pack_type','$pack_price','$pack_details', '$pack_status', '$imagepath')";
       $result_pack=mysqli_query($conn, $sql_pack);
       $package_id  = mysqli_insert_id($conn);

if($result_pack){ 
    for ($a = 0; $a < $activity_count; $a++) {

        $aid = $_POST['pack_activities'][$a];
      
      $sql_activity = "INSERT INTO packages_activity_list (`package_id`, activity_id, addby) VALUES ('$package_id', '$aid', '$user_id')";
      $result_classInsert = mysqli_query($conn, $sql_activity);        
      } 
}else
{
echo "error";
}
       
    }else{
      print_r($errors);
    }
 }
  

//  $sql = "INSERT INTO camp_activity (`ac_name`,
//                                     `ac_price`,
//                                     `ac_status`,
//                                     `ac_desc`) VALUES ('$ac_name',
//                                                          '$ac_price',
//                                                          '$ac_status',
//                                                          '$ac_desc')";

   
        //  $result  = mysqli_query($conn,$sql);

        //  if($result){
        //      echo "sucess";
        //  }else{
        //      echo "error";
        //  }

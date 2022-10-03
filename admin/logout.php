<?php
session_start();
include('include/connection.php');
$_SESSION['userID']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>

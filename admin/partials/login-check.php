<?php
//Authorization -access control
//check whether the user is checked in or not
if(!isset($_SESSION['user'])){//if user is not set
//user is not set
$_SESSION['no-login-message'] = "<div class='error'>Please login to access admin panel</div>";
//redirect to login page with message
header("location:".SITEURL."admin/login.php");
}

?>
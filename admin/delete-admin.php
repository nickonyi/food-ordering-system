<?php
//include the connection file
include ("../config/dbh.php");
//get the id of the admin to be deleted
 $id = $_GET['id'];
//create sql query to delete the message
$sql = "DELETE FROM tbl_admin WHERE  id = $id";
//execute the query
$res = mysqli_query($conn,$sql);
//check whether the query is executed or not
if($res){
//query executed successfully and amin deleted
//echo "admin deleted";
//create a session variable to display message
$_SESSION['delete']  = "Admin successfully deleted";
//redirect to manage-admin page
header("Location:".SITEURL.'admin/manage-admin.php');
} else {
//failed to delete admin successfully
//echo "admin not deleted";
$_SESSION['delete'] = "Failed to delete admin";
//redirect to manage-admin page
header("Location:".SITEURL.'admin/manage-admin.php');
}
//Redirect to the admin page with the message (success/error)


?>
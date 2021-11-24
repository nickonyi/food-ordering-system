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
$_SESSION['delete']  = "<div class='success'>Admin successfully deleted.</div>";
//redirect to manage-admin page
header("Location:".SITEURL.'admin/manage-admin.php');
} else {
//failed to delete admin successfully
//echo "admin not deleted";
$_SESSION['delete'] = "<div class='error'>Failed to delete admin.</div>";
//redirect to manage-admin page
header("Location:".SITEURL.'admin/manage-admin.php');
}
//Redirect to the admin page with the message (success/error)


?>
<?php  include ("partials/menu.php");?> 
<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        ?>
        <form action="" method="post">
        <table class="tbl-30">
            <tr>
                <td>Current password:</td>
                <td>
                    <input type="password" name="current_password" placeholder="Current password" >
                </td>
            </tr>
            <tr>
                <td>New password:</td>
                <td>
                    <input type="password" name="new_password" placeholder="New password" >
                </td>
            </tr>
            <tr>
                <td>Confirm password:</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm password" >
                </td>
            </tr>
            <tr colspan="2">
                <td>
                    <input type="hidden" name='id' value = "<?php echo $id;?>">
                    <input type="submit" name="submit" value="Change password" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
       
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    
    //get the data from the form
    $id = $_POST['id'];
    $current_password =md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    //check whether the user with the current password and the current id exists
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
    //execute the query
    $res = mysqli_query($conn,$sql);
    //check whether the query has been executed or not
    if($res){
//check whether the data is available or not
$count = mysqli_num_rows($res);
if($count == 1){
//user exists and password can be changed
//check whether the new password and confirm password match or not
if($new_password == $confirm_password){
     //update the password
     $sql2 = "UPDATE tbl_admin SET
     password = '$new_password'
     WHERE id = $id
     ";
     //execute the query
     $res2 = mysqli_query($conn,$sql2);
     //check if the query is executed or not
     if($res2) {
         //display success message
         $_SESSION['password-update'] = "<div class='success'>Password succesfully changed </div>";
         //redirect to manage admin page
         header("Location:".SITEURL."admin/manage-admin.php");
     } else {
         //display error message
         $_SESSION['password-update'] = "<div class='error'>Failed to update password </div>";
         //redirect to manage admin page
         header("Location:".SITEURL."admin/manage-admin.php");
        }

} else {
//redirect to manage admin page with message
$_SESSION['pwd-not-match'] = "<div class='error'> The password do not match</div>";
header("location:".SITEURL."admin/manage-admin.php");
}
} else {
//user does not exist,set message and then redirect to admin page
$_SESSION['user-not-found'] = "<div class='error'>user does not exist</div>";
//refirect to admin page
header("Location:".SITEURL."admin/manage-admin.php");
}

    } 
}
?>
<?php  include ("partials/footer.php");?> 
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
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    //check whether the user with the current password and the current id exists
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
    //execute the query
    $res = mysqli_query($conn,$sql);
    if($res){
        //check whether the data exists or not
        $count = mysqli_num_rows($res);
        if($count === 1){
            //user exist and the data can be changed
            echo "user found";
        } else {
            //user does not exist so set message then redirect
            $_SESSION['user-not-found'] = "<div class='error'>user not found.</div>";
            header("location:".SITEURL."admin/manage-admin.php");

        }
    }
    //check whether the new password or the confirm password 
    //change password if all the above is true
}
?>
<?php  include ("partials/footer.php");?> 
<?php  include ("partials/menu.php");?> 

<div class="main-content">
    <div class="wrapper">
        <h1>Update admin</h1>
        <br><br>
        <?php
        //get the id
        $id = $_GET['id'];
        //create an sql query to get the details
        $sql = "SELECT * FROM tbl_admin WHERE id = $id";
        //execute the query
        $res = mysqli_query($conn,$sql);
        //check if the query is executed
        if($res){
            //check whether the data is available or not
            $count = mysqli_num_rows($res);//function to collect all the rows
            //check whether we have admin data or not
            if($count === 1){
                //get the details
                //echo the admin name
                $rows = mysqli_fetch_assoc($res);

                $full_name = $rows['full_name'];
                $username = $rows['username'];
            } else {
                echo "we aint got the guy";
            }

        } 
        
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>">
                    </td>
                    </tr>
                    <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name= "username" value="<?php echo $username;?>">
                    </td>
                </tr>
               <tr>
                   <td colspan="2">
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                       <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                   </td>
               </tr>
            </table>
        </form>
    </div>
</div>
<?php
//check whether the submit value has been clicked
if(isset($_POST['submit'])){
    //get all the values from the form to update
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     //create an sql query to update Admin
     $sql = "UPDATE tbl_admin SET 
     full_name = '$full_name',
     username = '$username'
     WHERE
     id = '$id'
     ";
     //execute the query
     $res = mysqli_query($conn,$sql);
     //check whether the query has been executed successfully or not
     if($res){
         //query executed and admin updated
         $_SESSION['update'] = "<div class='success'>Admin sucesfully updated</div>";
         //redirect to manage admin page
         header("Location:".SITEURL."admin/manage-admin.php" );
        
     } else {
         //failed to update admin
         $_SESSION['update'] = "<div class='error'>Admin sucesfully updated</div>";
         //redirect to manage admin page
         header("Location:".SITEURL."admin/manage-admin.php" );
        
     }
}
?>
<?php  include ("partials/footer.php");?> 
<?php 
include ("partials/menu.php");
ini_set('display_errors',1);
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        //check whether the id is set or not 
        if(isset($_GET['id'])){
            //get the id and all other values
            $id = $_GET['id'];
            //create an sql query to get all the data
            $sql ="SELECT * FROM tbl_category WHERE id = $id ";
            //execute the query
            $res = mysqli_query($conn,$sql);
            //count all the rows to see if the id is valid or not
            $count = mysqli_num_rows($res);
            if($count == 1){
                //get all the data
                $rows = mysqli_fetch_assoc($res);
                //get the individual data
                $id = $rows['id'];
                $title = $rows['title'];
                $current_image = $rows['image_name'];
                $featured = $rows['featured'];
                $active = $rows['active'];

            } else {
                //display the error message
                $_SESSION['category-not-found'] = "<div class='error'>Category was not found.</div>";
                //redirect to manage category page
                header("location:".SITEURL."admin/manage-category.php");
            }
        } else {
            //redirect to the manage category page
            header("Location:".SITEURL."admin/manage-category.php");
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
                </tr>
                <tr>
                    <td>Current image:</td>
                    <td>
                        <?php
                        
                        if($current_image  !=""){
                            //display the image
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="200px">
                            <?php
                        }else {
                            //display the message
                            echo "<div class='error'>Image not found</div>";
                        }
                        ?>
                        
                    </td>
                </tr>
                <tr>
                <td>New image:</td>
                <td>
                    <input type="file" name="image">
                </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input  <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value ="Yes">Yes
                        <input  <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value ="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input   <?php if($active == "Yes"){echo "checked";}?> type="radio" name="active" value ="Yes">Yes
                        <input <?php if($active == "No"){echo "checked";}?> type="radio" name="active" value ="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
        </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            //collect all the data from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //update the new image if selected
            //update the database
            $sql2 ="UPDATE tbl_category SET
            title = '$title',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
            ";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            //check whether the query is executed or not
            if($res2){
                 //display success message  
                 $_SESSION['update'] = "<div class='success'>Category update successfully!</div>";
                 //redirect to manage category page
                 header("location:".SITEURL."admin/manage-category.php");
            }else {
                    //display success message  
                    $_SESSION['update'] = "<div class='error'>Failed to update category!</div>";
                    //redirect to manage category page
                    header("location:".SITEURL."admin/manage-category.php");
            }
            //direct tothe manage category page
        }
        ?>
        
    </div>
</div>
<?php  
include ("partials/footer.php");
?>
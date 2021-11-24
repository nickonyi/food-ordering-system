<?php  include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add category</h1>
<?php
if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>

        <!----Add category form starts here-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category title">
                    </td>
                </tr>
                <td>Select image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name= "featured" value="Yes">Yes
                        <input type="radio" name= "featured" value="No">No
                    </td>   
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value= "Add Category" class="btn-secondary">
                    </td>
                </tr>
                

            </table>
        </form>

      
        <?php
        //check whether the submit button is clicked or not
        if(isset($_POST['submit'])){
            //echo "clicked";
            //get the value from the category form
           $title = $_POST['title'];
            //for radio input we need to check if the button is selected or not
            if(isset($_POST['featured'])){
             $featured = $_POST['featured'];
            } else {
             $featured = "No";
            } 
            if(isset($_POST['active'])){
               $active = $_POST['active'];
            } else {
                 $active = "No";
            }
            //check whether the file is selected or not and set its value accordingly
          
if(isset($_FILES['image']['name'])){
    //upload the image 
    //to upload the image we need image name,source path and destinatio path
    $image_name = $_FILES['image']['name'];
//auto  rename our image
//get the extension of our image (jpg,gif,png)
    $ext = end(explode('.',$image_name));
    //rename the image
    $image_name = "food_category_".rand(000,999).'.'.$ext; //eg food_category_937.jpg

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path = "../images/category/".$image_name;

    $upload = move_uploaded_file($source_path,$destination_path);

    if(!$upload){
        //display the error message
        $_SESSION['upload'] = "<div class='error'>The image was not uploaded.</div>";
        //redirect to the add category page
        header("location:".SITEURL."admin/add-category.php");
    }
} else {
    //don't upload the image and leave the value blank
    $image_name = "";
}
        

            //create sql query to insert data into the database
          $sql = "INSERT into tbl_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            ";
//execute the query
         $res = mysqli_query($conn,$sql);
         if($res){
             //query executed and category added
             $_SESSION['add'] = "<div class='success'>Category added successfully!</div>";
             //redirect to manage category page
             header("location:".SITEURL."admin/manage-category.php");
         } else {
              //failed to add category
              $_SESSION['add'] = "<div class='error'>Failed to add category!</div>";
              //redirect to manage category page
              header("location:".SITEURL."admin/manage-category.php");
         }
       
        }
        	
        ?>
        <!----Add category form ends here-->
    </div>
</div>
<?php  include("partials/footer.php");?>